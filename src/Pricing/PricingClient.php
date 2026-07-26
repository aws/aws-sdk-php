<?php
namespace Aws\Pricing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Price List Service** service.
 * @method \Aws\Result describeServices(array $args = [])
 * @phpstan-method \Aws\Result describeServices(array{ServiceCode?: string, FormatVersion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServicesAsync(array{ServiceCode?: string, FormatVersion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getAttributeValues(array $args = [])
 * @phpstan-method \Aws\Result getAttributeValues(array{ServiceCode?: string, AttributeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAttributeValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAttributeValuesAsync(array{ServiceCode?: string, AttributeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getPriceListFileUrl(array $args = [])
 * @phpstan-method \Aws\Result getPriceListFileUrl(array{PriceListArn?: string, FileFormat?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPriceListFileUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPriceListFileUrlAsync(array{PriceListArn?: string, FileFormat?: string, ...} $args = [])
 * @method \Aws\Result getProducts(array $args = [])
 * @phpstan-method \Aws\Result getProducts(array{
 *     ServiceCode?: string,
 *     Filters?: list<array{Type?: 'ANY_OF'|'CONTAINS'|'EQUALS'|'NONE_OF'|'TERM_MATCH', Field?: string, Value?: string, ...}>,
 *     FormatVersion?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductsAsync(array{
 *     ServiceCode?: string,
 *     Filters?: list<array{Type?: 'ANY_OF'|'CONTAINS'|'EQUALS'|'NONE_OF'|'TERM_MATCH', Field?: string, Value?: string, ...}>,
 *     FormatVersion?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPriceLists(array $args = [])
 * @phpstan-method \Aws\Result listPriceLists(array{
 *     ServiceCode?: string,
 *     EffectiveDate?: int|string|\DateTimeInterface,
 *     RegionCode?: string,
 *     CurrencyCode?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPriceListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPriceListsAsync(array{
 *     ServiceCode?: string,
 *     EffectiveDate?: int|string|\DateTimeInterface,
 *     RegionCode?: string,
 *     CurrencyCode?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 */
class PricingClient extends AwsClient {}
