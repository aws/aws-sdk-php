<?php
namespace Aws\WAFV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS WAFV2** service.
 * @method \Aws\Result associateWebACL(array $args = [])
 * @phpstan-method \Aws\Result associateWebACL(array{WebACLArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWebACLAsync(array{WebACLArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result checkCapacity(array $args = [])
 * @phpstan-method \Aws\Result checkCapacity(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkCapacityAsync(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAPIKey(array $args = [])
 * @phpstan-method \Aws\Result createAPIKey(array{Scope?: 'CLOUDFRONT'|'REGIONAL', TokenDomains?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAPIKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAPIKeyAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', TokenDomains?: list<string>, ...} $args = [])
 * @method \Aws\Result createIPSet(array $args = [])
 * @phpstan-method \Aws\Result createIPSet(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Description?: string,
 *     IPAddressVersion?: 'IPV4'|'IPV6',
 *     Addresses?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIPSetAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Description?: string,
 *     IPAddressVersion?: 'IPV4'|'IPV6',
 *     Addresses?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result createRegexPatternSet(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Description?: string,
 *     RegularExpressionList?: list<array{RegexString?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegexPatternSetAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Description?: string,
 *     RegularExpressionList?: list<array{RegexString?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result createRuleGroup(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Capacity?: int,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Capacity?: int,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebACL(array $args = [])
 * @phpstan-method \Aws\Result createWebACL(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     DefaultAction?: array{Block?: array{CustomResponse?: array, ...}, Allow?: array{CustomRequestHandling?: array, ...}, ...},
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     DataProtectionConfig?: array{DataProtections?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     CaptchaConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     ChallengeConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     TokenDomains?: list<string>,
 *     AssociationConfig?: array{RequestBody?: array<string, array>, ...},
 *     OnSourceDDoSProtectionConfig?: array{ALBLowReputationMode?: 'ACTIVE_UNDER_DDOS'|'ALWAYS_ON', ...},
 *     ApplicationConfig?: array{Attributes?: list<array>, ...},
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebACLAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     DefaultAction?: array{Block?: array{CustomResponse?: array, ...}, Allow?: array{CustomRequestHandling?: array, ...}, ...},
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     DataProtectionConfig?: array{DataProtections?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     CaptchaConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     ChallengeConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     TokenDomains?: list<string>,
 *     AssociationConfig?: array{RequestBody?: array<string, array>, ...},
 *     OnSourceDDoSProtectionConfig?: array{ALBLowReputationMode?: 'ACTIVE_UNDER_DDOS'|'ALWAYS_ON', ...},
 *     ApplicationConfig?: array{Attributes?: list<array>, ...},
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAPIKey(array $args = [])
 * @phpstan-method \Aws\Result deleteAPIKey(array{Scope?: 'CLOUDFRONT'|'REGIONAL', APIKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAPIKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAPIKeyAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', APIKey?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewallManagerRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallManagerRuleGroups(array{WebACLArn?: string, WebACLLockToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallManagerRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallManagerRuleGroupsAsync(array{WebACLArn?: string, WebACLLockToken?: string, ...} $args = [])
 * @method \Aws\Result deleteIPSet(array $args = [])
 * @phpstan-method \Aws\Result deleteIPSet(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \Aws\Result deleteLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLoggingConfiguration(array{
 *     ResourceArn?: string,
 *     LogType?: 'WAF_LOGS',
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array{
 *     ResourceArn?: string,
 *     LogType?: 'WAF_LOGS',
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result deleteRegexPatternSet(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegexPatternSetAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleGroup(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \Aws\Result deleteWebACL(array $args = [])
 * @phpstan-method \Aws\Result deleteWebACL(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebACLAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, LockToken?: string, ...} $args = [])
 * @method \Aws\Result describeAllManagedProducts(array $args = [])
 * @phpstan-method \Aws\Result describeAllManagedProducts(array{Scope?: 'CLOUDFRONT'|'REGIONAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAllManagedProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAllManagedProductsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', ...} $args = [])
 * @method \Aws\Result describeManagedProductsByVendor(array $args = [])
 * @phpstan-method \Aws\Result describeManagedProductsByVendor(array{VendorName?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedProductsByVendorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedProductsByVendorAsync(array{VendorName?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', ...} $args = [])
 * @method \Aws\Result describeManagedRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result describeManagedRuleGroup(array{VendorName?: string, Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', VersionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedRuleGroupAsync(array{VendorName?: string, Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', VersionName?: string, ...} $args = [])
 * @method \Aws\Result disassociateWebACL(array $args = [])
 * @phpstan-method \Aws\Result disassociateWebACL(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWebACLAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result generateMobileSdkReleaseUrl(array $args = [])
 * @phpstan-method \Aws\Result generateMobileSdkReleaseUrl(array{Platform?: 'ANDROID'|'IOS', ReleaseVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateMobileSdkReleaseUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateMobileSdkReleaseUrlAsync(array{Platform?: 'ANDROID'|'IOS', ReleaseVersion?: string, ...} $args = [])
 * @method \Aws\Result getDecryptedAPIKey(array $args = [])
 * @phpstan-method \Aws\Result getDecryptedAPIKey(array{Scope?: 'CLOUDFRONT'|'REGIONAL', APIKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDecryptedAPIKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDecryptedAPIKeyAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', APIKey?: string, ...} $args = [])
 * @method \Aws\Result getIPSet(array $args = [])
 * @phpstan-method \Aws\Result getIPSet(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIPSetAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \Aws\Result getLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLoggingConfiguration(array{
 *     ResourceArn?: string,
 *     LogType?: 'WAF_LOGS',
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array{
 *     ResourceArn?: string,
 *     LogType?: 'WAF_LOGS',
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getManagedRuleSet(array $args = [])
 * @phpstan-method \Aws\Result getManagedRuleSet(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedRuleSetAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \Aws\Result getMobileSdkRelease(array $args = [])
 * @phpstan-method \Aws\Result getMobileSdkRelease(array{Platform?: 'ANDROID'|'IOS', ReleaseVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMobileSdkReleaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMobileSdkReleaseAsync(array{Platform?: 'ANDROID'|'IOS', ReleaseVersion?: string, ...} $args = [])
 * @method \Aws\Result getPermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPermissionPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPermissionPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getRateBasedStatementManagedKeys(array $args = [])
 * @phpstan-method \Aws\Result getRateBasedStatementManagedKeys(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     WebACLName?: string,
 *     WebACLId?: string,
 *     RuleGroupRuleName?: string,
 *     RuleName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRateBasedStatementManagedKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRateBasedStatementManagedKeysAsync(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     WebACLName?: string,
 *     WebACLId?: string,
 *     RuleGroupRuleName?: string,
 *     RuleName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result getRegexPatternSet(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegexPatternSetAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ...} $args = [])
 * @method \Aws\Result getRevenueStatistics(array $args = [])
 * @phpstan-method \Aws\Result getRevenueStatistics(array{
 *     StatisticType?: 'TOP_PATHS_BY_REVENUE'|'TOP_SOURCES_BY_REVENUE',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     GroupBy?: 'CATEGORY'|'INTENT'|'NAME'|'ORGANIZATION'|'WEBACL',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextMarker?: string,
 *     Limit?: int,
 *     SortBy?: 'NAME'|'PERCENTAGE'|'REVENUE',
 *     SortOrder?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueStatisticsAsync(array{
 *     StatisticType?: 'TOP_PATHS_BY_REVENUE'|'TOP_SOURCES_BY_REVENUE',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     GroupBy?: 'CATEGORY'|'INTENT'|'NAME'|'ORGANIZATION'|'WEBACL',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextMarker?: string,
 *     Limit?: int,
 *     SortBy?: 'NAME'|'PERCENTAGE'|'REVENUE',
 *     SortOrder?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRevenueStatisticsSummary(array $args = [])
 * @phpstan-method \Aws\Result getRevenueStatisticsSummary(array{
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueStatisticsSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueStatisticsSummaryAsync(array{
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRevenueStatisticsTimeSeries(array $args = [])
 * @phpstan-method \Aws\Result getRevenueStatisticsTimeSeries(array{
 *     StatisticType?: 'DATE_HISTOGRAM'|'PAYMENT_TRAFFIC',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Interval?: 'DAILY'|'FIVE_MINUTELY'|'HOURLY'|'MINUTELY',
 *     Currency?: 'USDC',
 *     GroupBy?: 'CATEGORY'|'INTENT'|'NAME'|'ORGANIZATION'|'WEBACL',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Limit?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevenueStatisticsTimeSeriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevenueStatisticsTimeSeriesAsync(array{
 *     StatisticType?: 'DATE_HISTOGRAM'|'PAYMENT_TRAFFIC',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Interval?: 'DAILY'|'FIVE_MINUTELY'|'HOURLY'|'MINUTELY',
 *     Currency?: 'USDC',
 *     GroupBy?: 'CATEGORY'|'INTENT'|'NAME'|'ORGANIZATION'|'WEBACL',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Limit?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result getRuleGroup(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleGroupAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ARN?: string, ...} $args = [])
 * @method \Aws\Result getSampledRequests(array $args = [])
 * @phpstan-method \Aws\Result getSampledRequests(array{
 *     WebAclArn?: string,
 *     RuleMetricName?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSampledRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSampledRequestsAsync(array{
 *     WebAclArn?: string,
 *     RuleMetricName?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTopPathStatisticsByTraffic(array $args = [])
 * @phpstan-method \Aws\Result getTopPathStatisticsByTraffic(array{
 *     WebAclArn?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     UriPathPrefix?: string,
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     BotCategory?: string,
 *     BotOrganization?: string,
 *     BotName?: string,
 *     Limit?: int,
 *     NumberOfTopTrafficBotsPerPath?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTopPathStatisticsByTrafficAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTopPathStatisticsByTrafficAsync(array{
 *     WebAclArn?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     UriPathPrefix?: string,
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     BotCategory?: string,
 *     BotOrganization?: string,
 *     BotName?: string,
 *     Limit?: int,
 *     NumberOfTopTrafficBotsPerPath?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWebACL(array $args = [])
 * @phpstan-method \Aws\Result getWebACL(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebACLAsync(array{Name?: string, Scope?: 'CLOUDFRONT'|'REGIONAL', Id?: string, ARN?: string, ...} $args = [])
 * @method \Aws\Result getWebACLForResource(array $args = [])
 * @phpstan-method \Aws\Result getWebACLForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebACLForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebACLForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listAPIKeys(array $args = [])
 * @phpstan-method \Aws\Result listAPIKeys(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAPIKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAPIKeysAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listAvailableManagedRuleGroupVersions(array $args = [])
 * @phpstan-method \Aws\Result listAvailableManagedRuleGroupVersions(array{
 *     VendorName?: string,
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     NextMarker?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableManagedRuleGroupVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableManagedRuleGroupVersionsAsync(array{
 *     VendorName?: string,
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     NextMarker?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAvailableManagedRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listAvailableManagedRuleGroups(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableManagedRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableManagedRuleGroupsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listIPSets(array $args = [])
 * @phpstan-method \Aws\Result listIPSets(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIPSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIPSetsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listLoggingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listLoggingConfigurations(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     NextMarker?: string,
 *     Limit?: int,
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array{
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     NextMarker?: string,
 *     Limit?: int,
 *     LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedRuleSets(array $args = [])
 * @phpstan-method \Aws\Result listManagedRuleSets(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedRuleSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedRuleSetsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listMobileSdkReleases(array $args = [])
 * @phpstan-method \Aws\Result listMobileSdkReleases(array{Platform?: 'ANDROID'|'IOS', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMobileSdkReleasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMobileSdkReleasesAsync(array{Platform?: 'ANDROID'|'IOS', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRegexPatternSets(array $args = [])
 * @phpstan-method \Aws\Result listRegexPatternSets(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegexPatternSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegexPatternSetsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listResourcesForWebACL(array $args = [])
 * @phpstan-method \Aws\Result listResourcesForWebACL(array{
 *     WebACLArn?: string,
 *     ResourceType?: 'AGENTCORE_GATEWAY'|'AMPLIFY'|'API_GATEWAY'|'APPLICATION_LOAD_BALANCER'|'APPSYNC'|'APP_RUNNER_SERVICE'|'COGNITO_USER_POOL'|'VERIFIED_ACCESS_INSTANCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesForWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesForWebACLAsync(array{
 *     WebACLArn?: string,
 *     ResourceType?: 'AGENTCORE_GATEWAY'|'AMPLIFY'|'API_GATEWAY'|'APPLICATION_LOAD_BALANCER'|'APPSYNC'|'APP_RUNNER_SERVICE'|'COGNITO_USER_POOL'|'VERIFIED_ACCESS_INSTANCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listRuleGroups(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listSettlementRecords(array $args = [])
 * @phpstan-method \Aws\Result listSettlementRecords(array{
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: 'AMOUNT'|'NAME'|'STATUS'|'TIMESTAMP',
 *     SortOrder?: 'ASC'|'DESC',
 *     Limit?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSettlementRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSettlementRecordsAsync(array{
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Currency?: 'USDC',
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: 'AMOUNT'|'NAME'|'STATUS'|'TIMESTAMP',
 *     SortOrder?: 'ASC'|'DESC',
 *     Limit?: int,
 *     NextMarker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{NextMarker?: string, Limit?: int, ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{NextMarker?: string, Limit?: int, ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listWebACLs(array $args = [])
 * @phpstan-method \Aws\Result listWebACLs(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebACLsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebACLsAsync(array{Scope?: 'CLOUDFRONT'|'REGIONAL', NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result putLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putLoggingConfiguration(array{
 *     LoggingConfiguration?: array{
 *         ResourceArn?: string,
 *         LogDestinationConfigs?: list<string>,
 *         RedactedFields?: list<array>,
 *         ManagedByFirewallManager?: bool,
 *         LoggingFilter?: array{Filters?: list<array>, DefaultBehavior?: 'DROP'|'KEEP', ...},
 *         LogType?: 'WAF_LOGS',
 *         LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLoggingConfigurationAsync(array{
 *     LoggingConfiguration?: array{
 *         ResourceArn?: string,
 *         LogDestinationConfigs?: list<string>,
 *         RedactedFields?: list<array>,
 *         ManagedByFirewallManager?: bool,
 *         LoggingFilter?: array{Filters?: list<array>, DefaultBehavior?: 'DROP'|'KEEP', ...},
 *         LogType?: 'WAF_LOGS',
 *         LogScope?: 'CLOUDWATCH_TELEMETRY_RULE_MANAGED'|'CUSTOMER'|'SECURITY_LAKE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putManagedRuleSetVersions(array $args = [])
 * @phpstan-method \Aws\Result putManagedRuleSetVersions(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     LockToken?: string,
 *     RecommendedVersion?: string,
 *     VersionsToPublish?: array<string, array{AssociatedRuleGroupArn?: string, ForecastedLifetime?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putManagedRuleSetVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putManagedRuleSetVersionsAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     LockToken?: string,
 *     RecommendedVersion?: string,
 *     VersionsToPublish?: array<string, array{AssociatedRuleGroupArn?: string, ForecastedLifetime?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPermissionPolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putPermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPermissionPolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIPSet(array $args = [])
 * @phpstan-method \Aws\Result updateIPSet(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     Addresses?: list<string>,
 *     LockToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIPSetAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     Addresses?: list<string>,
 *     LockToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateManagedRuleSetVersionExpiryDate(array $args = [])
 * @phpstan-method \Aws\Result updateManagedRuleSetVersionExpiryDate(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     LockToken?: string,
 *     VersionToExpire?: string,
 *     ExpiryTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateManagedRuleSetVersionExpiryDateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateManagedRuleSetVersionExpiryDateAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     LockToken?: string,
 *     VersionToExpire?: string,
 *     ExpiryTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result updateRegexPatternSet(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     RegularExpressionList?: list<array{RegexString?: string, ...}>,
 *     LockToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegexPatternSetAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     RegularExpressionList?: list<array{RegexString?: string, ...}>,
 *     LockToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRuleGroup(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     LockToken?: string,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     LockToken?: string,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebACL(array $args = [])
 * @phpstan-method \Aws\Result updateWebACL(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     DefaultAction?: array{Block?: array{CustomResponse?: array, ...}, Allow?: array{CustomRequestHandling?: array, ...}, ...},
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     DataProtectionConfig?: array{DataProtections?: list<array>, ...},
 *     LockToken?: string,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     CaptchaConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     ChallengeConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     TokenDomains?: list<string>,
 *     AssociationConfig?: array{RequestBody?: array<string, array>, ...},
 *     OnSourceDDoSProtectionConfig?: array{ALBLowReputationMode?: 'ACTIVE_UNDER_DDOS'|'ALWAYS_ON', ...},
 *     ApplicationConfig?: array{Attributes?: list<array>, ...},
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebACLAsync(array{
 *     Name?: string,
 *     Scope?: 'CLOUDFRONT'|'REGIONAL',
 *     Id?: string,
 *     DefaultAction?: array{Block?: array{CustomResponse?: array, ...}, Allow?: array{CustomRequestHandling?: array, ...}, ...},
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Priority?: int,
 *         Statement?: array,
 *         Action?: array,
 *         OverrideAction?: array,
 *         RuleLabels?: list<array>,
 *         VisibilityConfig?: array,
 *         CaptchaConfig?: array,
 *         ChallengeConfig?: array,
 *         ...,
 *     }>,
 *     VisibilityConfig?: array{SampledRequestsEnabled?: bool, CloudWatchMetricsEnabled?: bool, MetricName?: string, ...},
 *     DataProtectionConfig?: array{DataProtections?: list<array>, ...},
 *     LockToken?: string,
 *     CustomResponseBodies?: array<string, array{ContentType?: 'APPLICATION_JSON'|'TEXT_HTML'|'TEXT_PLAIN', Content?: string, ...}>,
 *     CaptchaConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     ChallengeConfig?: array{ImmunityTimeProperty?: array{ImmunityTime?: int, ...}, ...},
 *     TokenDomains?: list<string>,
 *     AssociationConfig?: array{RequestBody?: array<string, array>, ...},
 *     OnSourceDDoSProtectionConfig?: array{ALBLowReputationMode?: 'ACTIVE_UNDER_DDOS'|'ALWAYS_ON', ...},
 *     ApplicationConfig?: array{Attributes?: list<array>, ...},
 *     MonetizationConfig?: array{CryptoConfig?: array{PaymentNetworks?: list<array>, ...}, CurrencyMode?: 'REAL'|'TEST', ...},
 *     ...,
 * } $args = [])
 */
class WAFV2Client extends AwsClient {}
