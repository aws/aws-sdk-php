<?php
namespace Aws\MarketplaceMetering;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSMarketplace Metering** service.
 * @method \Aws\Result batchMeterUsage(array $args = [])
 * @phpstan-method \Aws\Result batchMeterUsage(array{
 *     UsageRecords?: list<array{
 *         Timestamp?: int|string|\DateTimeInterface,
 *         CustomerIdentifier?: string,
 *         Dimension?: string,
 *         Quantity?: int,
 *         UsageAllocations?: list<array>,
 *         CustomerAWSAccountId?: string,
 *         LicenseArn?: string,
 *         ...,
 *     }>,
 *     ProductCode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchMeterUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchMeterUsageAsync(array{
 *     UsageRecords?: list<array{
 *         Timestamp?: int|string|\DateTimeInterface,
 *         CustomerIdentifier?: string,
 *         Dimension?: string,
 *         Quantity?: int,
 *         UsageAllocations?: list<array>,
 *         CustomerAWSAccountId?: string,
 *         LicenseArn?: string,
 *         ...,
 *     }>,
 *     ProductCode?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result meterUsage(array $args = [])
 * @phpstan-method \Aws\Result meterUsage(array{
 *     ProductCode?: string,
 *     Timestamp?: int|string|\DateTimeInterface,
 *     UsageDimension?: string,
 *     UsageQuantity?: int,
 *     DryRun?: bool,
 *     UsageAllocations?: list<array{AllocatedUsageQuantity?: int, Tags?: list<array>, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise meterUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise meterUsageAsync(array{
 *     ProductCode?: string,
 *     Timestamp?: int|string|\DateTimeInterface,
 *     UsageDimension?: string,
 *     UsageQuantity?: int,
 *     DryRun?: bool,
 *     UsageAllocations?: list<array{AllocatedUsageQuantity?: int, Tags?: list<array>, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerUsage(array $args = [])
 * @phpstan-method \Aws\Result registerUsage(array{ProductCode?: string, PublicKeyVersion?: int, Nonce?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerUsageAsync(array{ProductCode?: string, PublicKeyVersion?: int, Nonce?: string, ...} $args = [])
 * @method \Aws\Result resolveCustomer(array $args = [])
 * @phpstan-method \Aws\Result resolveCustomer(array{RegistrationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveCustomerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resolveCustomerAsync(array{RegistrationToken?: string, ...} $args = [])
 */
class MarketplaceMeteringClient extends AwsClient {}
