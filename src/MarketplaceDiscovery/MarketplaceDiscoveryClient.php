<?php
namespace Aws\MarketplaceDiscovery;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Discovery** service.
 * @method \Aws\Result getListing(array $args = [])
 * @phpstan-method \Aws\Result getListing(array{listingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getListingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getListingAsync(array{listingId?: string, ...} $args = [])
 * @method \Aws\Result getOffer(array $args = [])
 * @phpstan-method \Aws\Result getOffer(array{offerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOfferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOfferAsync(array{offerId?: string, ...} $args = [])
 * @method \Aws\Result getOfferSet(array $args = [])
 * @phpstan-method \Aws\Result getOfferSet(array{offerSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOfferSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOfferSetAsync(array{offerSetId?: string, ...} $args = [])
 * @method \Aws\Result getOfferTerms(array $args = [])
 * @phpstan-method \Aws\Result getOfferTerms(array{offerId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOfferTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOfferTermsAsync(array{offerId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getProduct(array $args = [])
 * @phpstan-method \Aws\Result getProduct(array{productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductAsync(array{productId?: string, ...} $args = [])
 * @method \Aws\Result listFulfillmentOptions(array $args = [])
 * @phpstan-method \Aws\Result listFulfillmentOptions(array{productId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFulfillmentOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFulfillmentOptionsAsync(array{productId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPurchaseOptions(array $args = [])
 * @phpstan-method \Aws\Result listPurchaseOptions(array{
 *     filters?: list<array{
 *         filterType?: 'AVAILABILITY_STATUS'|'PRODUCT_ID'|'PURCHASE_OPTION_TYPE'|'SELLER_OF_RECORD_PROFILE_ID'|'VISIBILITY_SCOPE',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPurchaseOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPurchaseOptionsAsync(array{
 *     filters?: list<array{
 *         filterType?: 'AVAILABILITY_STATUS'|'PRODUCT_ID'|'PURCHASE_OPTION_TYPE'|'SELLER_OF_RECORD_PROFILE_ID'|'VISIBILITY_SCOPE',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFacets(array $args = [])
 * @phpstan-method \Aws\Result searchFacets(array{
 *     searchText?: string,
 *     filters?: list<array{
 *         filterType?: 'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'MAX_AVERAGE_CUSTOMER_RATING'|'MIN_AVERAGE_CUSTOMER_RATING'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     facetTypes?: list<'AVERAGE_CUSTOMER_RATING'|'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER'>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFacetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFacetsAsync(array{
 *     searchText?: string,
 *     filters?: list<array{
 *         filterType?: 'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'MAX_AVERAGE_CUSTOMER_RATING'|'MIN_AVERAGE_CUSTOMER_RATING'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     facetTypes?: list<'AVERAGE_CUSTOMER_RATING'|'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER'>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchListings(array $args = [])
 * @phpstan-method \Aws\Result searchListings(array{
 *     searchText?: string,
 *     filters?: list<array{
 *         filterType?: 'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'MAX_AVERAGE_CUSTOMER_RATING'|'MIN_AVERAGE_CUSTOMER_RATING'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     sortBy?: 'AVERAGE_CUSTOMER_RATING'|'RELEVANCE',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchListingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchListingsAsync(array{
 *     searchText?: string,
 *     filters?: list<array{
 *         filterType?: 'CATEGORY'|'DEPLOYED_ON_AWS'|'FULFILLMENT_OPTION_TYPE'|'MAX_AVERAGE_CUSTOMER_RATING'|'MIN_AVERAGE_CUSTOMER_RATING'|'NUMBER_OF_PRODUCTS'|'PRICING_MODEL'|'PRICING_UNIT'|'PUBLISHER',
 *         filterValues?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     sortBy?: 'AVERAGE_CUSTOMER_RATING'|'RELEVANCE',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 */
class MarketplaceDiscoveryClient extends AwsClient {}
