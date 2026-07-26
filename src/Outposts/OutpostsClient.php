<?php
namespace Aws\Outposts;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Outposts** service.
 * @method \Aws\Result cancelCapacityTask(array $args = [])
 * @phpstan-method \Aws\Result cancelCapacityTask(array{CapacityTaskId?: string, OutpostIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCapacityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelCapacityTaskAsync(array{CapacityTaskId?: string, OutpostIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelOrder(array $args = [])
 * @phpstan-method \Aws\Result cancelOrder(array{OrderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelOrderAsync(array{OrderId?: string, ...} $args = [])
 * @method \Aws\Result createOrder(array $args = [])
 * @phpstan-method \Aws\Result createOrder(array{
 *     OutpostIdentifier?: string,
 *     QuoteIdentifier?: string,
 *     QuoteOptionIdentifier?: string,
 *     LineItems?: list<array{CatalogItemId?: string, Quantity?: int, ...}>,
 *     PaymentOption?: 'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     PaymentTerm?: 'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOrderAsync(array{
 *     OutpostIdentifier?: string,
 *     QuoteIdentifier?: string,
 *     QuoteOptionIdentifier?: string,
 *     LineItems?: list<array{CatalogItemId?: string, Quantity?: int, ...}>,
 *     PaymentOption?: 'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     PaymentTerm?: 'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOutpost(array $args = [])
 * @phpstan-method \Aws\Result createOutpost(array{
 *     Name?: string,
 *     Description?: string,
 *     SiteId?: string,
 *     AvailabilityZone?: string,
 *     AvailabilityZoneId?: string,
 *     Tags?: array<string, string>,
 *     SupportedHardwareType?: 'RACK'|'SERVER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOutpostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOutpostAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     SiteId?: string,
 *     AvailabilityZone?: string,
 *     AvailabilityZoneId?: string,
 *     Tags?: array<string, string>,
 *     SupportedHardwareType?: 'RACK'|'SERVER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuote(array $args = [])
 * @phpstan-method \Aws\Result createQuote(array{
 *     OutpostIdentifier?: string,
 *     CountryCode?: string,
 *     RequestedCapacities?: list<array{QuoteCapacityType?: 'EBS'|'EC2'|'S3', Unit?: string, Quantity?: float, ...}>,
 *     RequestedConstraints?: list<array{QuoteConstraintType?: 'RACK_MAXIMUM'|'RACK_MAX_POWER_KVA'|'RACK_MAX_WEIGHT_LBS', Value?: string, ...}>,
 *     RequestedPaymentOptions?: list<'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT'>,
 *     RequestedPaymentTerms?: list<'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS'>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuoteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuoteAsync(array{
 *     OutpostIdentifier?: string,
 *     CountryCode?: string,
 *     RequestedCapacities?: list<array{QuoteCapacityType?: 'EBS'|'EC2'|'S3', Unit?: string, Quantity?: float, ...}>,
 *     RequestedConstraints?: list<array{QuoteConstraintType?: 'RACK_MAXIMUM'|'RACK_MAX_POWER_KVA'|'RACK_MAX_WEIGHT_LBS', Value?: string, ...}>,
 *     RequestedPaymentOptions?: list<'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT'>,
 *     RequestedPaymentTerms?: list<'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS'>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRenewal(array $args = [])
 * @phpstan-method \Aws\Result createRenewal(array{
 *     PaymentOption?: 'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     PaymentTerm?: 'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS',
 *     OutpostIdentifier?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRenewalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRenewalAsync(array{
 *     PaymentOption?: 'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     PaymentTerm?: 'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS',
 *     OutpostIdentifier?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSite(array $args = [])
 * @phpstan-method \Aws\Result createSite(array{
 *     Name?: string,
 *     Description?: string,
 *     Notes?: string,
 *     Tags?: array<string, string>,
 *     OperatingAddress?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     RackPhysicalProperties?: array{
 *         PowerDrawKva?: 'POWER_10_KVA'|'POWER_15_KVA'|'POWER_30_KVA'|'POWER_5_KVA',
 *         PowerPhase?: 'SINGLE_PHASE'|'THREE_PHASE',
 *         PowerConnector?: 'AH530P7W'|'AH532P6W'|'CS8365C'|'IEC309'|'L6_30P',
 *         PowerFeedDrop?: 'ABOVE_RACK'|'BELOW_RACK',
 *         UplinkGbps?: 'UPLINK_100G'|'UPLINK_10G'|'UPLINK_1G'|'UPLINK_40G',
 *         UplinkCount?: 'UPLINK_COUNT_1'|'UPLINK_COUNT_12'|'UPLINK_COUNT_16'|'UPLINK_COUNT_2'|'UPLINK_COUNT_3'|'UPLINK_COUNT_4'|'UPLINK_COUNT_5'|'UPLINK_COUNT_6'|'UPLINK_COUNT_7'|'UPLINK_COUNT_8',
 *         FiberOpticCableType?: 'MULTI_MODE'|'SINGLE_MODE',
 *         OpticalStandard?: 'OPTIC_1000BASE_LX'|'OPTIC_1000BASE_SX'|'OPTIC_100GBASE_CWDM4'|'OPTIC_100GBASE_LR4'|'OPTIC_100GBASE_SR4'|'OPTIC_100G_PSM4_MSA'|'OPTIC_10GBASE_IR'|'OPTIC_10GBASE_LR'|'OPTIC_10GBASE_SR'|'OPTIC_40GBASE_ESR'|'OPTIC_40GBASE_IR4_LR4L'|'OPTIC_40GBASE_LR4'|'OPTIC_40GBASE_SR',
 *         MaximumSupportedWeightLbs?: 'MAX_1400_LBS'|'MAX_1600_LBS'|'MAX_1800_LBS'|'MAX_2000_LBS'|'NO_LIMIT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSiteAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Notes?: string,
 *     Tags?: array<string, string>,
 *     OperatingAddress?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     RackPhysicalProperties?: array{
 *         PowerDrawKva?: 'POWER_10_KVA'|'POWER_15_KVA'|'POWER_30_KVA'|'POWER_5_KVA',
 *         PowerPhase?: 'SINGLE_PHASE'|'THREE_PHASE',
 *         PowerConnector?: 'AH530P7W'|'AH532P6W'|'CS8365C'|'IEC309'|'L6_30P',
 *         PowerFeedDrop?: 'ABOVE_RACK'|'BELOW_RACK',
 *         UplinkGbps?: 'UPLINK_100G'|'UPLINK_10G'|'UPLINK_1G'|'UPLINK_40G',
 *         UplinkCount?: 'UPLINK_COUNT_1'|'UPLINK_COUNT_12'|'UPLINK_COUNT_16'|'UPLINK_COUNT_2'|'UPLINK_COUNT_3'|'UPLINK_COUNT_4'|'UPLINK_COUNT_5'|'UPLINK_COUNT_6'|'UPLINK_COUNT_7'|'UPLINK_COUNT_8',
 *         FiberOpticCableType?: 'MULTI_MODE'|'SINGLE_MODE',
 *         OpticalStandard?: 'OPTIC_1000BASE_LX'|'OPTIC_1000BASE_SX'|'OPTIC_100GBASE_CWDM4'|'OPTIC_100GBASE_LR4'|'OPTIC_100GBASE_SR4'|'OPTIC_100G_PSM4_MSA'|'OPTIC_10GBASE_IR'|'OPTIC_10GBASE_LR'|'OPTIC_10GBASE_SR'|'OPTIC_40GBASE_ESR'|'OPTIC_40GBASE_IR4_LR4L'|'OPTIC_40GBASE_LR4'|'OPTIC_40GBASE_SR',
 *         MaximumSupportedWeightLbs?: 'MAX_1400_LBS'|'MAX_1600_LBS'|'MAX_1800_LBS'|'MAX_2000_LBS'|'NO_LIMIT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteOutpost(array $args = [])
 * @phpstan-method \Aws\Result deleteOutpost(array{OutpostId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutpostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutpostAsync(array{OutpostId?: string, ...} $args = [])
 * @method \Aws\Result deleteQuote(array $args = [])
 * @phpstan-method \Aws\Result deleteQuote(array{QuoteIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuoteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuoteAsync(array{QuoteIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSite(array $args = [])
 * @phpstan-method \Aws\Result deleteSite(array{SiteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSiteAsync(array{SiteId?: string, ...} $args = [])
 * @method \Aws\Result getCapacityTask(array $args = [])
 * @phpstan-method \Aws\Result getCapacityTask(array{CapacityTaskId?: string, OutpostIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCapacityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCapacityTaskAsync(array{CapacityTaskId?: string, OutpostIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCatalogItem(array $args = [])
 * @phpstan-method \Aws\Result getCatalogItem(array{CatalogItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCatalogItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCatalogItemAsync(array{CatalogItemId?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result getOrder(array $args = [])
 * @phpstan-method \Aws\Result getOrder(array{OrderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrderAsync(array{OrderId?: string, ...} $args = [])
 * @method \Aws\Result getOutpost(array $args = [])
 * @phpstan-method \Aws\Result getOutpost(array{OutpostId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutpostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutpostAsync(array{OutpostId?: string, ...} $args = [])
 * @method \Aws\Result getOutpostBillingInformation(array $args = [])
 * @phpstan-method \Aws\Result getOutpostBillingInformation(array{NextToken?: string, MaxResults?: int, OutpostIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutpostBillingInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutpostBillingInformationAsync(array{NextToken?: string, MaxResults?: int, OutpostIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getOutpostInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result getOutpostInstanceTypes(array{OutpostId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutpostInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutpostInstanceTypesAsync(array{OutpostId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getOutpostSupportedInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result getOutpostSupportedInstanceTypes(array{
 *     OutpostIdentifier?: string,
 *     OrderId?: string,
 *     AssetId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutpostSupportedInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutpostSupportedInstanceTypesAsync(array{
 *     OutpostIdentifier?: string,
 *     OrderId?: string,
 *     AssetId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getQuote(array $args = [])
 * @phpstan-method \Aws\Result getQuote(array{QuoteIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuoteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuoteAsync(array{QuoteIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getRenewalPricing(array $args = [])
 * @phpstan-method \Aws\Result getRenewalPricing(array{OutpostIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRenewalPricingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRenewalPricingAsync(array{OutpostIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getSite(array $args = [])
 * @phpstan-method \Aws\Result getSite(array{SiteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSiteAsync(array{SiteId?: string, ...} $args = [])
 * @method \Aws\Result getSiteAddress(array $args = [])
 * @phpstan-method \Aws\Result getSiteAddress(array{SiteId?: string, AddressType?: 'OPERATING_ADDRESS'|'SHIPPING_ADDRESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSiteAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSiteAddressAsync(array{SiteId?: string, AddressType?: 'OPERATING_ADDRESS'|'SHIPPING_ADDRESS', ...} $args = [])
 * @method \Aws\Result listAssetInstances(array $args = [])
 * @phpstan-method \Aws\Result listAssetInstances(array{
 *     OutpostIdentifier?: string,
 *     AssetIdFilter?: list<string>,
 *     InstanceTypeFilter?: list<string>,
 *     AccountIdFilter?: list<string>,
 *     AwsServiceFilter?: list<'AWS'|'EC2'|'ELASTICACHE'|'ELB'|'RDS'|'ROUTE53'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetInstancesAsync(array{
 *     OutpostIdentifier?: string,
 *     AssetIdFilter?: list<string>,
 *     InstanceTypeFilter?: list<string>,
 *     AccountIdFilter?: list<string>,
 *     AwsServiceFilter?: list<'AWS'|'EC2'|'ELASTICACHE'|'ELB'|'RDS'|'ROUTE53'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssets(array $args = [])
 * @phpstan-method \Aws\Result listAssets(array{
 *     OutpostIdentifier?: string,
 *     HostIdFilter?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StatusFilter?: list<'ACTIVE'|'INSTALLING'|'ISOLATED'|'RETIRING'>,
 *     AssetTypeFilter?: list<'COMPUTE'|'NETWORKING'|'POWERSHELF'|'STORAGE'|'SWITCH'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetsAsync(array{
 *     OutpostIdentifier?: string,
 *     HostIdFilter?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StatusFilter?: list<'ACTIVE'|'INSTALLING'|'ISOLATED'|'RETIRING'>,
 *     AssetTypeFilter?: list<'COMPUTE'|'NETWORKING'|'POWERSHELF'|'STORAGE'|'SWITCH'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBlockingInstancesForCapacityTask(array $args = [])
 * @phpstan-method \Aws\Result listBlockingInstancesForCapacityTask(array{OutpostIdentifier?: string, CapacityTaskId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBlockingInstancesForCapacityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBlockingInstancesForCapacityTaskAsync(array{OutpostIdentifier?: string, CapacityTaskId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCapacityTasks(array $args = [])
 * @phpstan-method \Aws\Result listCapacityTasks(array{
 *     OutpostIdentifierFilter?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     CapacityTaskStatusFilter?: list<'CANCELLATION_IN_PROGRESS'|'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'REQUESTED'|'WAITING_FOR_EVACUATION'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCapacityTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCapacityTasksAsync(array{
 *     OutpostIdentifierFilter?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     CapacityTaskStatusFilter?: list<'CANCELLATION_IN_PROGRESS'|'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'REQUESTED'|'WAITING_FOR_EVACUATION'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCatalogItems(array $args = [])
 * @phpstan-method \Aws\Result listCatalogItems(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ItemClassFilter?: list<'RACK'|'SERVER'>,
 *     SupportedStorageFilter?: list<'EBS'|'S3'>,
 *     EC2FamilyFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCatalogItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCatalogItemsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ItemClassFilter?: list<'RACK'|'SERVER'>,
 *     SupportedStorageFilter?: list<'EBS'|'S3'>,
 *     EC2FamilyFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOrderableInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result listOrderableInstanceTypes(array{OutpostGenerationFilter?: 'GENERATION_1'|'GENERATION_2', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrderableInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrderableInstanceTypesAsync(array{OutpostGenerationFilter?: 'GENERATION_1'|'GENERATION_2', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOrders(array $args = [])
 * @phpstan-method \Aws\Result listOrders(array{OutpostIdentifierFilter?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrdersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrdersAsync(array{OutpostIdentifierFilter?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOutposts(array $args = [])
 * @phpstan-method \Aws\Result listOutposts(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LifeCycleStatusFilter?: list<string>,
 *     AvailabilityZoneFilter?: list<string>,
 *     AvailabilityZoneIdFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutpostsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutpostsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LifeCycleStatusFilter?: list<string>,
 *     AvailabilityZoneFilter?: list<string>,
 *     AvailabilityZoneIdFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQuotes(array $args = [])
 * @phpstan-method \Aws\Result listQuotes(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuotesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuotesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSites(array $args = [])
 * @phpstan-method \Aws\Result listSites(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     OperatingAddressCountryCodeFilter?: list<string>,
 *     OperatingAddressStateOrRegionFilter?: list<string>,
 *     OperatingAddressCityFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSitesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSitesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     OperatingAddressCountryCodeFilter?: list<string>,
 *     OperatingAddressStateOrRegionFilter?: list<string>,
 *     OperatingAddressCityFilter?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startCapacityTask(array $args = [])
 * @phpstan-method \Aws\Result startCapacityTask(array{
 *     OutpostIdentifier?: string,
 *     OrderId?: string,
 *     AssetId?: string,
 *     InstancePools?: list<array{InstanceType?: string, Count?: int, ...}>,
 *     InstancesToExclude?: array{
 *         Instances?: list<string>,
 *         AccountIds?: list<string>,
 *         Services?: list<'AWS'|'EC2'|'ELASTICACHE'|'ELB'|'RDS'|'ROUTE53'>,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     TaskActionOnBlockingInstances?: 'FAIL_TASK'|'WAIT_FOR_EVACUATION',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCapacityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCapacityTaskAsync(array{
 *     OutpostIdentifier?: string,
 *     OrderId?: string,
 *     AssetId?: string,
 *     InstancePools?: list<array{InstanceType?: string, Count?: int, ...}>,
 *     InstancesToExclude?: array{
 *         Instances?: list<string>,
 *         AccountIds?: list<string>,
 *         Services?: list<'AWS'|'EC2'|'ELASTICACHE'|'ELB'|'RDS'|'ROUTE53'>,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     TaskActionOnBlockingInstances?: 'FAIL_TASK'|'WAIT_FOR_EVACUATION',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startConnection(array $args = [])
 * @phpstan-method \Aws\Result startConnection(array{
 *     DeviceSerialNumber?: string,
 *     AssetId?: string,
 *     ClientPublicKey?: string,
 *     NetworkInterfaceDeviceIndex?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConnectionAsync(array{
 *     DeviceSerialNumber?: string,
 *     AssetId?: string,
 *     ClientPublicKey?: string,
 *     NetworkInterfaceDeviceIndex?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startOutpostDecommission(array $args = [])
 * @phpstan-method \Aws\Result startOutpostDecommission(array{OutpostIdentifier?: string, ValidateOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startOutpostDecommissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOutpostDecommissionAsync(array{OutpostIdentifier?: string, ValidateOnly?: bool, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateOutpost(array $args = [])
 * @phpstan-method \Aws\Result updateOutpost(array{OutpostId?: string, Name?: string, Description?: string, SupportedHardwareType?: 'RACK'|'SERVER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOutpostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOutpostAsync(array{OutpostId?: string, Name?: string, Description?: string, SupportedHardwareType?: 'RACK'|'SERVER', ...} $args = [])
 * @method \Aws\Result updateQuote(array $args = [])
 * @phpstan-method \Aws\Result updateQuote(array{
 *     QuoteIdentifier?: string,
 *     OutpostIdentifier?: string,
 *     CountryCode?: string,
 *     RequestedCapacities?: list<array{QuoteCapacityType?: 'EBS'|'EC2'|'S3', Unit?: string, Quantity?: float, ...}>,
 *     RequestedConstraints?: list<array{QuoteConstraintType?: 'RACK_MAXIMUM'|'RACK_MAX_POWER_KVA'|'RACK_MAX_WEIGHT_LBS', Value?: string, ...}>,
 *     RequestedPaymentOptions?: list<'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT'>,
 *     RequestedPaymentTerms?: list<'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS'>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuoteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuoteAsync(array{
 *     QuoteIdentifier?: string,
 *     OutpostIdentifier?: string,
 *     CountryCode?: string,
 *     RequestedCapacities?: list<array{QuoteCapacityType?: 'EBS'|'EC2'|'S3', Unit?: string, Quantity?: float, ...}>,
 *     RequestedConstraints?: list<array{QuoteConstraintType?: 'RACK_MAXIMUM'|'RACK_MAX_POWER_KVA'|'RACK_MAX_WEIGHT_LBS', Value?: string, ...}>,
 *     RequestedPaymentOptions?: list<'ALL_UPFRONT'|'NO_UPFRONT'|'PARTIAL_UPFRONT'>,
 *     RequestedPaymentTerms?: list<'FIVE_YEARS'|'ONE_YEAR'|'THREE_YEARS'>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSite(array $args = [])
 * @phpstan-method \Aws\Result updateSite(array{SiteId?: string, Name?: string, Description?: string, Notes?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSiteAsync(array{SiteId?: string, Name?: string, Description?: string, Notes?: string, ...} $args = [])
 * @method \Aws\Result updateSiteAddress(array $args = [])
 * @phpstan-method \Aws\Result updateSiteAddress(array{
 *     SiteId?: string,
 *     AddressType?: 'OPERATING_ADDRESS'|'SHIPPING_ADDRESS',
 *     Address?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSiteAddressAsync(array{
 *     SiteId?: string,
 *     AddressType?: 'OPERATING_ADDRESS'|'SHIPPING_ADDRESS',
 *     Address?: array{
 *         ContactName?: string,
 *         ContactPhoneNumber?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         Municipality?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSiteRackPhysicalProperties(array $args = [])
 * @phpstan-method \Aws\Result updateSiteRackPhysicalProperties(array{
 *     SiteId?: string,
 *     PowerDrawKva?: 'POWER_10_KVA'|'POWER_15_KVA'|'POWER_30_KVA'|'POWER_5_KVA',
 *     PowerPhase?: 'SINGLE_PHASE'|'THREE_PHASE',
 *     PowerConnector?: 'AH530P7W'|'AH532P6W'|'CS8365C'|'IEC309'|'L6_30P',
 *     PowerFeedDrop?: 'ABOVE_RACK'|'BELOW_RACK',
 *     UplinkGbps?: 'UPLINK_100G'|'UPLINK_10G'|'UPLINK_1G'|'UPLINK_40G',
 *     UplinkCount?: 'UPLINK_COUNT_1'|'UPLINK_COUNT_12'|'UPLINK_COUNT_16'|'UPLINK_COUNT_2'|'UPLINK_COUNT_3'|'UPLINK_COUNT_4'|'UPLINK_COUNT_5'|'UPLINK_COUNT_6'|'UPLINK_COUNT_7'|'UPLINK_COUNT_8',
 *     FiberOpticCableType?: 'MULTI_MODE'|'SINGLE_MODE',
 *     OpticalStandard?: 'OPTIC_1000BASE_LX'|'OPTIC_1000BASE_SX'|'OPTIC_100GBASE_CWDM4'|'OPTIC_100GBASE_LR4'|'OPTIC_100GBASE_SR4'|'OPTIC_100G_PSM4_MSA'|'OPTIC_10GBASE_IR'|'OPTIC_10GBASE_LR'|'OPTIC_10GBASE_SR'|'OPTIC_40GBASE_ESR'|'OPTIC_40GBASE_IR4_LR4L'|'OPTIC_40GBASE_LR4'|'OPTIC_40GBASE_SR',
 *     MaximumSupportedWeightLbs?: 'MAX_1400_LBS'|'MAX_1600_LBS'|'MAX_1800_LBS'|'MAX_2000_LBS'|'NO_LIMIT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteRackPhysicalPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSiteRackPhysicalPropertiesAsync(array{
 *     SiteId?: string,
 *     PowerDrawKva?: 'POWER_10_KVA'|'POWER_15_KVA'|'POWER_30_KVA'|'POWER_5_KVA',
 *     PowerPhase?: 'SINGLE_PHASE'|'THREE_PHASE',
 *     PowerConnector?: 'AH530P7W'|'AH532P6W'|'CS8365C'|'IEC309'|'L6_30P',
 *     PowerFeedDrop?: 'ABOVE_RACK'|'BELOW_RACK',
 *     UplinkGbps?: 'UPLINK_100G'|'UPLINK_10G'|'UPLINK_1G'|'UPLINK_40G',
 *     UplinkCount?: 'UPLINK_COUNT_1'|'UPLINK_COUNT_12'|'UPLINK_COUNT_16'|'UPLINK_COUNT_2'|'UPLINK_COUNT_3'|'UPLINK_COUNT_4'|'UPLINK_COUNT_5'|'UPLINK_COUNT_6'|'UPLINK_COUNT_7'|'UPLINK_COUNT_8',
 *     FiberOpticCableType?: 'MULTI_MODE'|'SINGLE_MODE',
 *     OpticalStandard?: 'OPTIC_1000BASE_LX'|'OPTIC_1000BASE_SX'|'OPTIC_100GBASE_CWDM4'|'OPTIC_100GBASE_LR4'|'OPTIC_100GBASE_SR4'|'OPTIC_100G_PSM4_MSA'|'OPTIC_10GBASE_IR'|'OPTIC_10GBASE_LR'|'OPTIC_10GBASE_SR'|'OPTIC_40GBASE_ESR'|'OPTIC_40GBASE_IR4_LR4L'|'OPTIC_40GBASE_LR4'|'OPTIC_40GBASE_SR',
 *     MaximumSupportedWeightLbs?: 'MAX_1400_LBS'|'MAX_1600_LBS'|'MAX_1800_LBS'|'MAX_2000_LBS'|'NO_LIMIT',
 *     ...,
 * } $args = [])
 */
class OutpostsClient extends AwsClient {}
