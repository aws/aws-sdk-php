<?php
namespace Aws\PartnerCentralRevenueMeasurement;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Revenue Measurement API** service.
 * @method \Aws\Result createMarketplaceRevenueShare(array $args = [])
 * @phpstan-method \Aws\Result createMarketplaceRevenueShare(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ClientToken?: string,
 *     ProductId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMarketplaceRevenueShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMarketplaceRevenueShareAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ClientToken?: string,
 *     ProductId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMarketplaceRevenueShareAllocation(array $args = [])
 * @phpstan-method \Aws\Result createMarketplaceRevenueShareAllocation(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     ClientToken?: string,
 *     EffectiveFrom?: string,
 *     EffectiveUntil?: string,
 *     RevenueSharePercent?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMarketplaceRevenueShareAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMarketplaceRevenueShareAllocationAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     ClientToken?: string,
 *     EffectiveFrom?: string,
 *     EffectiveUntil?: string,
 *     RevenueSharePercent?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRevenueAttribution(array $args = [])
 * @phpstan-method \Aws\Result createRevenueAttribution(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     TenancyModel?: 'MULTI_TENANT'|'SINGLE_TENANT',
 *     ProductIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRevenueAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRevenueAttributionAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     TenancyModel?: 'MULTI_TENANT'|'SINGLE_TENANT',
 *     ProductIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMarketplaceRevenueShare(array $args = [])
 * @phpstan-method \Aws\Result getMarketplaceRevenueShare(array{Catalog?: 'AWS'|'Sandbox', ProductId?: string, Revision?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMarketplaceRevenueShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMarketplaceRevenueShareAsync(array{Catalog?: 'AWS'|'Sandbox', ProductId?: string, Revision?: int, ...} $args = [])
 * @method \Aws\Result getMarketplaceRevenueShareAllocation(array $args = [])
 * @phpstan-method \Aws\Result getMarketplaceRevenueShareAllocation(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     MarketplaceRevenueShareAllocationId?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMarketplaceRevenueShareAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMarketplaceRevenueShareAllocationAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     MarketplaceRevenueShareAllocationId?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRevenueAttribution(array $args = [])
 * @phpstan-method \Aws\Result getRevenueAttribution(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, Revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueAttributionAsync(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, Revision?: string, ...} $args = [])
 * @method \Aws\Result getRevenueAttributionAllocation(array $args = [])
 * @phpstan-method \Aws\Result getRevenueAttributionAllocation(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     RevenueAttributionAllocationId?: string,
 *     RevenueAttributionRevision?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueAttributionAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueAttributionAllocationAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     RevenueAttributionAllocationId?: string,
 *     RevenueAttributionRevision?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRevenueAttributionAllocationsTask(array $args = [])
 * @phpstan-method \Aws\Result getRevenueAttributionAllocationsTask(array{Catalog?: 'AWS'|'Sandbox', RevenueAttributionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueAttributionAllocationsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueAttributionAllocationsTaskAsync(array{Catalog?: 'AWS'|'Sandbox', RevenueAttributionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listMarketplaceRevenueShareAllocations(array $args = [])
 * @phpstan-method \Aws\Result listMarketplaceRevenueShareAllocations(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     AfterEffectiveFrom?: string,
 *     BeforeEffectiveFrom?: string,
 *     SortBy?: 'EffectiveFrom',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMarketplaceRevenueShareAllocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMarketplaceRevenueShareAllocationsAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     AfterEffectiveFrom?: string,
 *     BeforeEffectiveFrom?: string,
 *     SortBy?: 'EffectiveFrom',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMarketplaceRevenueShares(array $args = [])
 * @phpstan-method \Aws\Result listMarketplaceRevenueShares(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductIds?: list<string>,
 *     ProductCodes?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'LastModifiedDate',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMarketplaceRevenueSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMarketplaceRevenueSharesAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductIds?: list<string>,
 *     ProductCodes?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'LastModifiedDate',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRevenueAttributionAllocations(array $args = [])
 * @phpstan-method \Aws\Result listRevenueAttributionAllocations(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     EntityTypeFilters?: list<'OFFER'|'OPPORTUNITY'>,
 *     EntityIdentifierFilters?: list<string>,
 *     CustomerAwsAccountIdFilters?: list<string>,
 *     StatusFilter?: 'ACTIVE'|'INACTIVE',
 *     AfterEffectiveFrom?: string,
 *     BeforeEffectiveFrom?: string,
 *     AfterEffectiveUntil?: string,
 *     BeforeEffectiveUntil?: string,
 *     SortBy?: 'EffectiveFrom',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     RevenueAttributionRevision?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRevenueAttributionAllocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRevenueAttributionAllocationsAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     EntityTypeFilters?: list<'OFFER'|'OPPORTUNITY'>,
 *     EntityIdentifierFilters?: list<string>,
 *     CustomerAwsAccountIdFilters?: list<string>,
 *     StatusFilter?: 'ACTIVE'|'INACTIVE',
 *     AfterEffectiveFrom?: string,
 *     BeforeEffectiveFrom?: string,
 *     AfterEffectiveUntil?: string,
 *     BeforeEffectiveUntil?: string,
 *     SortBy?: 'EffectiveFrom',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     RevenueAttributionRevision?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRevenueAttributions(array $args = [])
 * @phpstan-method \Aws\Result listRevenueAttributions(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Identifiers?: list<string>,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'LastModifiedDate',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRevenueAttributionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRevenueAttributionsAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Identifiers?: list<string>,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'LastModifiedDate',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startRevenueAttributionAllocationsTask(array $args = [])
 * @phpstan-method \Aws\Result startRevenueAttributionAllocationsTask(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     RevenueAttributionRevision?: string,
 *     RevenueShareAllocations?: list<array{
 *         Action?: 'CREATE'|'UPDATE',
 *         RevenueAttributionAllocationId?: string,
 *         EntityType?: 'OFFER'|'OPPORTUNITY',
 *         EntityIdentifier?: string,
 *         CustomerAwsAccountId?: string,
 *         RevenueSharePercent?: string,
 *         EffectiveFrom?: string,
 *         EffectiveUntil?: string,
 *         Status?: 'ACTIVE'|'INACTIVE',
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRevenueAttributionAllocationsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRevenueAttributionAllocationsTaskAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     RevenueAttributionIdentifier?: string,
 *     RevenueAttributionRevision?: string,
 *     RevenueShareAllocations?: list<array{
 *         Action?: 'CREATE'|'UPDATE',
 *         RevenueAttributionAllocationId?: string,
 *         EntityType?: 'OFFER'|'OPPORTUNITY',
 *         EntityIdentifier?: string,
 *         CustomerAwsAccountId?: string,
 *         RevenueSharePercent?: string,
 *         EffectiveFrom?: string,
 *         EffectiveUntil?: string,
 *         Status?: 'ACTIVE'|'INACTIVE',
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMarketplaceRevenueShareAllocation(array $args = [])
 * @phpstan-method \Aws\Result updateMarketplaceRevenueShareAllocation(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     MarketplaceRevenueShareAllocationId?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ClientToken?: string,
 *     EffectiveFrom?: string,
 *     EffectiveUntil?: string,
 *     RevenueSharePercent?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMarketplaceRevenueShareAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMarketplaceRevenueShareAllocationAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     ProductId?: string,
 *     MarketplaceRevenueShareAllocationId?: string,
 *     MarketplaceRevenueShareRevision?: string,
 *     ClientToken?: string,
 *     EffectiveFrom?: string,
 *     EffectiveUntil?: string,
 *     RevenueSharePercent?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRevenueAttribution(array $args = [])
 * @phpstan-method \Aws\Result updateRevenueAttribution(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Identifier?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Revision?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRevenueAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRevenueAttributionAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Identifier?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Revision?: string,
 *     ...,
 * } $args = [])
 */
class PartnerCentralRevenueMeasurementClient extends AwsClient {}
