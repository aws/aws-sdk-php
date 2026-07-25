<?php
namespace Aws\ResourceExplorer2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Explorer** service.
 * @method \Aws\Result associateDefaultView(array $args = [])
 * @phpstan-method \Aws\Result associateDefaultView(array{ViewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDefaultViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDefaultViewAsync(array{ViewArn?: string, ...} $args = [])
 * @method \Aws\Result batchGetView(array $args = [])
 * @phpstan-method \Aws\Result batchGetView(array{ViewArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetViewAsync(array{ViewArns?: list<string>, ...} $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createResourceExplorerSetup(array $args = [])
 * @phpstan-method \Aws\Result createResourceExplorerSetup(array{RegionList?: list<string>, AggregatorRegions?: list<string>, ViewName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceExplorerSetupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceExplorerSetupAsync(array{RegionList?: list<string>, AggregatorRegions?: list<string>, ViewName?: string, ...} $args = [])
 * @method \Aws\Result createView(array $args = [])
 * @phpstan-method \Aws\Result createView(array{
 *     ClientToken?: string,
 *     ViewName?: string,
 *     IncludedProperties?: list<array{Name?: string, ...}>,
 *     Scope?: string,
 *     Filters?: array{FilterString?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createViewAsync(array{
 *     ClientToken?: string,
 *     ViewName?: string,
 *     IncludedProperties?: list<array{Name?: string, ...}>,
 *     Scope?: string,
 *     Filters?: array{FilterString?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceExplorerSetup(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceExplorerSetup(array{RegionList?: list<string>, DeleteInAllRegions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceExplorerSetupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceExplorerSetupAsync(array{RegionList?: list<string>, DeleteInAllRegions?: bool, ...} $args = [])
 * @method \Aws\Result deleteView(array $args = [])
 * @phpstan-method \Aws\Result deleteView(array{ViewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteViewAsync(array{ViewArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateDefaultView(array $args = [])
 * @phpstan-method \Aws\Result disassociateDefaultView(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDefaultViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDefaultViewAsync(array{...} $args = [])
 * @method \Aws\Result getAccountLevelServiceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAccountLevelServiceConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountLevelServiceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountLevelServiceConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getDefaultView(array $args = [])
 * @phpstan-method \Aws\Result getDefaultView(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultViewAsync(array{...} $args = [])
 * @method \Aws\Result getIndex(array $args = [])
 * @phpstan-method \Aws\Result getIndex(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexAsync(array{...} $args = [])
 * @method \Aws\Result getManagedView(array $args = [])
 * @phpstan-method \Aws\Result getManagedView(array{ManagedViewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedViewAsync(array{ManagedViewArn?: string, ...} $args = [])
 * @method \Aws\Result getResourceExplorerSetup(array $args = [])
 * @phpstan-method \Aws\Result getResourceExplorerSetup(array{TaskId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceExplorerSetupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceExplorerSetupAsync(array{TaskId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getServiceIndex(array $args = [])
 * @phpstan-method \Aws\Result getServiceIndex(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceIndexAsync(array{...} $args = [])
 * @method \Aws\Result getServiceView(array $args = [])
 * @phpstan-method \Aws\Result getServiceView(array{ServiceViewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceViewAsync(array{ServiceViewArn?: string, ...} $args = [])
 * @method \Aws\Result getView(array $args = [])
 * @phpstan-method \Aws\Result getView(array{ViewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getViewAsync(array{ViewArn?: string, ...} $args = [])
 * @method \Aws\Result listIndexes(array $args = [])
 * @phpstan-method \Aws\Result listIndexes(array{Type?: 'AGGREGATOR'|'LOCAL', Regions?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndexesAsync(array{Type?: 'AGGREGATOR'|'LOCAL', Regions?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listIndexesForMembers(array $args = [])
 * @phpstan-method \Aws\Result listIndexesForMembers(array{AccountIdList?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndexesForMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndexesForMembersAsync(array{AccountIdList?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedViews(array $args = [])
 * @phpstan-method \Aws\Result listManagedViews(array{MaxResults?: int, NextToken?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedViewsAsync(array{MaxResults?: int, NextToken?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     Filters?: array{FilterString?: string, ...},
 *     MaxResults?: int,
 *     ViewArn?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     Filters?: array{FilterString?: string, ...},
 *     MaxResults?: int,
 *     ViewArn?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceIndexes(array $args = [])
 * @phpstan-method \Aws\Result listServiceIndexes(array{Regions?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceIndexesAsync(array{Regions?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceViews(array $args = [])
 * @phpstan-method \Aws\Result listServiceViews(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceViewsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listStreamingAccessForServices(array $args = [])
 * @phpstan-method \Aws\Result listStreamingAccessForServices(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamingAccessForServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamingAccessForServicesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSupportedResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result listSupportedResourceTypes(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportedResourceTypesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listViews(array $args = [])
 * @phpstan-method \Aws\Result listViews(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listViewsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result search(array $args = [])
 * @phpstan-method \Aws\Result search(array{QueryString?: string, MaxResults?: int, ViewArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAsync(array{QueryString?: string, MaxResults?: int, ViewArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIndexType(array $args = [])
 * @phpstan-method \Aws\Result updateIndexType(array{Arn?: string, Type?: 'AGGREGATOR'|'LOCAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexTypeAsync(array{Arn?: string, Type?: 'AGGREGATOR'|'LOCAL', ...} $args = [])
 * @method \Aws\Result updateView(array $args = [])
 * @phpstan-method \Aws\Result updateView(array{
 *     ViewArn?: string,
 *     IncludedProperties?: list<array{Name?: string, ...}>,
 *     Filters?: array{FilterString?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateViewAsync(array{
 *     ViewArn?: string,
 *     IncludedProperties?: list<array{Name?: string, ...}>,
 *     Filters?: array{FilterString?: string, ...},
 *     ...,
 * } $args = [])
 */
class ResourceExplorer2Client extends AwsClient {}
