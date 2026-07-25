<?php
namespace Aws\Billing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing** service.
 * @method \Aws\Result associateSourceViews(array $args = [])
 * @phpstan-method \Aws\Result associateSourceViews(array{arn?: string, sourceViews?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceViewsAsync(array{arn?: string, sourceViews?: list<string>, ...} $args = [])
 * @method \Aws\Result createBillingView(array $args = [])
 * @phpstan-method \Aws\Result createBillingView(array{
 *     name?: string,
 *     description?: string,
 *     sourceViews?: list<string>,
 *     dataFilterExpression?: array{
 *         dimensions?: array{key?: 'LINKED_ACCOUNT', values?: list<string>, ...},
 *         tags?: array{key?: string, values?: list<string>, ...},
 *         costCategories?: array{key?: string, values?: list<string>, ...},
 *         timeRange?: array{
 *             beginDateInclusive?: int|string|\DateTimeInterface,
 *             endDateInclusive?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillingViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillingViewAsync(array{
 *     name?: string,
 *     description?: string,
 *     sourceViews?: list<string>,
 *     dataFilterExpression?: array{
 *         dimensions?: array{key?: 'LINKED_ACCOUNT', values?: list<string>, ...},
 *         tags?: array{key?: string, values?: list<string>, ...},
 *         costCategories?: array{key?: string, values?: list<string>, ...},
 *         timeRange?: array{
 *             beginDateInclusive?: int|string|\DateTimeInterface,
 *             endDateInclusive?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBillingView(array $args = [])
 * @phpstan-method \Aws\Result deleteBillingView(array{arn?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBillingViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBillingViewAsync(array{arn?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result disassociateSourceViews(array $args = [])
 * @phpstan-method \Aws\Result disassociateSourceViews(array{arn?: string, sourceViews?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSourceViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSourceViewsAsync(array{arn?: string, sourceViews?: list<string>, ...} $args = [])
 * @method \Aws\Result getBillingPreferences(array $args = [])
 * @phpstan-method \Aws\Result getBillingPreferences(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     features?: list<'BILLING_ALERTS'|'CREDIT_LEVEL_SHARING'|'CREDIT_PREFERENCE_OPTIONS'|'CREDIT_SHARING'|'CREDIT_SHARING_HISTORY'|'RI_SHARING'|'RI_SHARING_HISTORY'>,
 *     filters?: list<array{name?: 'PREFERENCE_KEY', value?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillingPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillingPreferencesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     features?: list<'BILLING_ALERTS'|'CREDIT_LEVEL_SHARING'|'CREDIT_PREFERENCE_OPTIONS'|'CREDIT_SHARING'|'CREDIT_SHARING_HISTORY'|'RI_SHARING'|'RI_SHARING_HISTORY'>,
 *     filters?: list<array{name?: 'PREFERENCE_KEY', value?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBillingView(array $args = [])
 * @phpstan-method \Aws\Result getBillingView(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillingViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillingViewAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getCreditAllocationHistory(array $args = [])
 * @phpstan-method \Aws\Result getCreditAllocationHistory(array{
 *     accountId?: string,
 *     creditId?: int,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCreditAllocationHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCreditAllocationHistoryAsync(array{
 *     accountId?: string,
 *     creditId?: int,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCredits(array $args = [])
 * @phpstan-method \Aws\Result getCredits(array{
 *     accountId?: string,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     payerAccountFlag?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCreditsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCreditsAsync(array{
 *     accountId?: string,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     payerAccountFlag?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listBillingViews(array $args = [])
 * @phpstan-method \Aws\Result listBillingViews(array{
 *     activeTimeRange?: array{
 *         activeAfterInclusive?: int|string|\DateTimeInterface,
 *         activeBeforeInclusive?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     arns?: list<string>,
 *     billingViewTypes?: list<'BILLING_GROUP'|'BILLING_TRANSFER'|'BILLING_TRANSFER_SHOWBACK'|'CUSTOM'|'PRIMARY'>,
 *     names?: list<array{searchOption?: 'STARTS_WITH', searchValue?: string, ...}>,
 *     ownerAccountId?: string,
 *     sourceAccountId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillingViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillingViewsAsync(array{
 *     activeTimeRange?: array{
 *         activeAfterInclusive?: int|string|\DateTimeInterface,
 *         activeBeforeInclusive?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     arns?: list<string>,
 *     billingViewTypes?: list<'BILLING_GROUP'|'BILLING_TRANSFER'|'BILLING_TRANSFER_SHOWBACK'|'CUSTOM'|'PRIMARY'>,
 *     names?: list<array{searchOption?: 'STARTS_WITH', searchValue?: string, ...}>,
 *     ownerAccountId?: string,
 *     sourceAccountId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceViewsForBillingView(array $args = [])
 * @phpstan-method \Aws\Result listSourceViewsForBillingView(array{arn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceViewsForBillingViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceViewsForBillingViewAsync(array{arn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result redeemCredits(array $args = [])
 * @phpstan-method \Aws\Result redeemCredits(array{promoCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise redeemCreditsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise redeemCreditsAsync(array{promoCode?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, resourceTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, resourceTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBillingPreferences(array $args = [])
 * @phpstan-method \Aws\Result updateBillingPreferences(array{
 *     feature?: 'BILLING_ALERTS'|'CREDIT_LEVEL_SHARING'|'CREDIT_PREFERENCE_OPTIONS'|'CREDIT_SHARING'|'CREDIT_SHARING_HISTORY'|'RI_SHARING'|'RI_SHARING_HISTORY',
 *     billingPreferencesPerKey?: list<array{key?: string, value?: 'DISABLED'|'ENABLED', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillingPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillingPreferencesAsync(array{
 *     feature?: 'BILLING_ALERTS'|'CREDIT_LEVEL_SHARING'|'CREDIT_PREFERENCE_OPTIONS'|'CREDIT_SHARING'|'CREDIT_SHARING_HISTORY'|'RI_SHARING'|'RI_SHARING_HISTORY',
 *     billingPreferencesPerKey?: list<array{key?: string, value?: 'DISABLED'|'ENABLED', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBillingView(array $args = [])
 * @phpstan-method \Aws\Result updateBillingView(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     dataFilterExpression?: array{
 *         dimensions?: array{key?: 'LINKED_ACCOUNT', values?: list<string>, ...},
 *         tags?: array{key?: string, values?: list<string>, ...},
 *         costCategories?: array{key?: string, values?: list<string>, ...},
 *         timeRange?: array{
 *             beginDateInclusive?: int|string|\DateTimeInterface,
 *             endDateInclusive?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillingViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillingViewAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     dataFilterExpression?: array{
 *         dimensions?: array{key?: 'LINKED_ACCOUNT', values?: list<string>, ...},
 *         tags?: array{key?: string, values?: list<string>, ...},
 *         costCategories?: array{key?: string, values?: list<string>, ...},
 *         timeRange?: array{
 *             beginDateInclusive?: int|string|\DateTimeInterface,
 *             endDateInclusive?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class BillingClient extends AwsClient {}
