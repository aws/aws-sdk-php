<?php
namespace Aws\ServiceDiscovery;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Auto Naming** service.
 * @method \Aws\Result createHttpNamespace(array $args = [])
 * @phpstan-method \Aws\Result createHttpNamespace(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHttpNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHttpNamespaceAsync(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrivateDnsNamespace(array $args = [])
 * @phpstan-method \Aws\Result createPrivateDnsNamespace(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Vpc?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Properties?: array{DnsProperties?: array{SOA?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateDnsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivateDnsNamespaceAsync(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Vpc?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Properties?: array{DnsProperties?: array{SOA?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPublicDnsNamespace(array $args = [])
 * @phpstan-method \Aws\Result createPublicDnsNamespace(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Properties?: array{DnsProperties?: array{SOA?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublicDnsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPublicDnsNamespaceAsync(array{
 *     Name?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Properties?: array{DnsProperties?: array{SOA?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     Name?: string,
 *     NamespaceId?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     DnsConfig?: array{NamespaceId?: string, RoutingPolicy?: 'MULTIVALUE'|'WEIGHTED', DnsRecords?: list<array>, ...},
 *     HealthCheckConfig?: array{Type?: 'HTTP'|'HTTPS'|'TCP', ResourcePath?: string, FailureThreshold?: int, ...},
 *     HealthCheckCustomConfig?: array{FailureThreshold?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Type?: 'HTTP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     Name?: string,
 *     NamespaceId?: string,
 *     CreatorRequestId?: string,
 *     Description?: string,
 *     DnsConfig?: array{NamespaceId?: string, RoutingPolicy?: 'MULTIVALUE'|'WEIGHTED', DnsRecords?: list<array>, ...},
 *     HealthCheckConfig?: array{Type?: 'HTTP'|'HTTPS'|'TCP', ResourcePath?: string, FailureThreshold?: int, ...},
 *     HealthCheckCustomConfig?: array{FailureThreshold?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Type?: 'HTTP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteNamespace(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceAttributes(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceAttributes(array{ServiceId?: string, Attributes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAttributesAsync(array{ServiceId?: string, Attributes?: list<string>, ...} $args = [])
 * @method \Aws\Result deregisterInstance(array $args = [])
 * @phpstan-method \Aws\Result deregisterInstance(array{ServiceId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterInstanceAsync(array{ServiceId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result discoverInstances(array $args = [])
 * @phpstan-method \Aws\Result discoverInstances(array{
 *     NamespaceName?: string,
 *     ServiceName?: string,
 *     MaxResults?: int,
 *     QueryParameters?: array<string, string>,
 *     OptionalParameters?: array<string, string>,
 *     HealthStatus?: 'ALL'|'HEALTHY'|'HEALTHY_OR_ELSE_ALL'|'UNHEALTHY',
 *     OwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise discoverInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discoverInstancesAsync(array{
 *     NamespaceName?: string,
 *     ServiceName?: string,
 *     MaxResults?: int,
 *     QueryParameters?: array<string, string>,
 *     OptionalParameters?: array<string, string>,
 *     HealthStatus?: 'ALL'|'HEALTHY'|'HEALTHY_OR_ELSE_ALL'|'UNHEALTHY',
 *     OwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result discoverInstancesRevision(array $args = [])
 * @phpstan-method \Aws\Result discoverInstancesRevision(array{NamespaceName?: string, ServiceName?: string, OwnerAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise discoverInstancesRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discoverInstancesRevisionAsync(array{NamespaceName?: string, ServiceName?: string, OwnerAccount?: string, ...} $args = [])
 * @method \Aws\Result getInstance(array $args = [])
 * @phpstan-method \Aws\Result getInstance(array{ServiceId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceAsync(array{ServiceId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result getInstancesHealthStatus(array $args = [])
 * @phpstan-method \Aws\Result getInstancesHealthStatus(array{ServiceId?: string, Instances?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstancesHealthStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstancesHealthStatusAsync(array{ServiceId?: string, Instances?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getNamespace(array $args = [])
 * @phpstan-method \Aws\Result getNamespace(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNamespaceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getOperation(array $args = [])
 * @phpstan-method \Aws\Result getOperation(array{OperationId?: string, OwnerAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationAsync(array{OperationId?: string, OwnerAccount?: string, ...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getServiceAttributes(array $args = [])
 * @phpstan-method \Aws\Result getServiceAttributes(array{ServiceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAttributesAsync(array{ServiceId?: string, ...} $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{ServiceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{ServiceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listNamespaces(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'HTTP_NAME'|'NAME'|'RESOURCE_OWNER'|'TYPE',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamespacesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'HTTP_NAME'|'NAME'|'RESOURCE_OWNER'|'TYPE',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @phpstan-method \Aws\Result listOperations(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'NAMESPACE_ID'|'SERVICE_ID'|'STATUS'|'TYPE'|'UPDATE_DATE',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOperationsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'NAMESPACE_ID'|'SERVICE_ID'|'STATUS'|'TYPE'|'UPDATE_DATE',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'NAMESPACE_ID'|'RESOURCE_OWNER',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         Name?: 'NAMESPACE_ID'|'RESOURCE_OWNER',
 *         Values?: list<string>,
 *         Condition?: 'BEGINS_WITH'|'BETWEEN'|'EQ'|'IN',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result registerInstance(array $args = [])
 * @phpstan-method \Aws\Result registerInstance(array{
 *     ServiceId?: string,
 *     InstanceId?: string,
 *     CreatorRequestId?: string,
 *     Attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerInstanceAsync(array{
 *     ServiceId?: string,
 *     InstanceId?: string,
 *     CreatorRequestId?: string,
 *     Attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateHttpNamespace(array $args = [])
 * @phpstan-method \Aws\Result updateHttpNamespace(array{Id?: string, UpdaterRequestId?: string, Namespace?: array{Description?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHttpNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHttpNamespaceAsync(array{Id?: string, UpdaterRequestId?: string, Namespace?: array{Description?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateInstanceCustomHealthStatus(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceCustomHealthStatus(array{ServiceId?: string, InstanceId?: string, Status?: 'HEALTHY'|'UNHEALTHY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceCustomHealthStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceCustomHealthStatusAsync(array{ServiceId?: string, InstanceId?: string, Status?: 'HEALTHY'|'UNHEALTHY', ...} $args = [])
 * @method \Aws\Result updatePrivateDnsNamespace(array $args = [])
 * @phpstan-method \Aws\Result updatePrivateDnsNamespace(array{
 *     Id?: string,
 *     UpdaterRequestId?: string,
 *     Namespace?: array{Description?: string, Properties?: array{DnsProperties?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrivateDnsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrivateDnsNamespaceAsync(array{
 *     Id?: string,
 *     UpdaterRequestId?: string,
 *     Namespace?: array{Description?: string, Properties?: array{DnsProperties?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePublicDnsNamespace(array $args = [])
 * @phpstan-method \Aws\Result updatePublicDnsNamespace(array{
 *     Id?: string,
 *     UpdaterRequestId?: string,
 *     Namespace?: array{Description?: string, Properties?: array{DnsProperties?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePublicDnsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePublicDnsNamespaceAsync(array{
 *     Id?: string,
 *     UpdaterRequestId?: string,
 *     Namespace?: array{Description?: string, Properties?: array{DnsProperties?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{
 *     Id?: string,
 *     Service?: array{
 *         Description?: string,
 *         DnsConfig?: array{DnsRecords?: list<array>, ...},
 *         HealthCheckConfig?: array{Type?: 'HTTP'|'HTTPS'|'TCP', ResourcePath?: string, FailureThreshold?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{
 *     Id?: string,
 *     Service?: array{
 *         Description?: string,
 *         DnsConfig?: array{DnsRecords?: list<array>, ...},
 *         HealthCheckConfig?: array{Type?: 'HTTP'|'HTTPS'|'TCP', ResourcePath?: string, FailureThreshold?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateServiceAttributes(array{ServiceId?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAttributesAsync(array{ServiceId?: string, Attributes?: array<string, string>, ...} $args = [])
 */
class ServiceDiscoveryClient extends AwsClient {}
