<?php
namespace Aws\LicenseManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS License Manager** service.
 * @method \Aws\Result acceptGrant(array $args = [])
 * @phpstan-method \Aws\Result acceptGrant(array{GrantArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptGrantAsync(array{GrantArn?: string, ...} $args = [])
 * @method \Aws\Result checkInLicense(array $args = [])
 * @phpstan-method \Aws\Result checkInLicense(array{LicenseConsumptionToken?: string, Beneficiary?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkInLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkInLicenseAsync(array{LicenseConsumptionToken?: string, Beneficiary?: string, ...} $args = [])
 * @method \Aws\Result checkoutBorrowLicense(array $args = [])
 * @phpstan-method \Aws\Result checkoutBorrowLicense(array{
 *     LicenseArn?: string,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     DigitalSignatureMethod?: 'JWT_PS384',
 *     NodeId?: string,
 *     CheckoutMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkoutBorrowLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkoutBorrowLicenseAsync(array{
 *     LicenseArn?: string,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     DigitalSignatureMethod?: 'JWT_PS384',
 *     NodeId?: string,
 *     CheckoutMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result checkoutLicense(array $args = [])
 * @phpstan-method \Aws\Result checkoutLicense(array{
 *     ProductSKU?: string,
 *     CheckoutType?: 'PERPETUAL'|'PROVISIONAL',
 *     KeyFingerprint?: string,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     Beneficiary?: string,
 *     NodeId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkoutLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkoutLicenseAsync(array{
 *     ProductSKU?: string,
 *     CheckoutType?: 'PERPETUAL'|'PROVISIONAL',
 *     KeyFingerprint?: string,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     Beneficiary?: string,
 *     NodeId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGrant(array $args = [])
 * @phpstan-method \Aws\Result createGrant(array{
 *     ClientToken?: string,
 *     GrantName?: string,
 *     LicenseArn?: string,
 *     Principals?: list<string>,
 *     HomeRegion?: string,
 *     AllowedOperations?: list<'CheckInLicense'|'CheckoutBorrowLicense'|'CheckoutLicense'|'CreateGrant'|'CreateToken'|'ExtendConsumptionLicense'|'ListPurchasedLicenses'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGrantAsync(array{
 *     ClientToken?: string,
 *     GrantName?: string,
 *     LicenseArn?: string,
 *     Principals?: list<string>,
 *     HomeRegion?: string,
 *     AllowedOperations?: list<'CheckInLicense'|'CheckoutBorrowLicense'|'CheckoutLicense'|'CreateGrant'|'CreateToken'|'ExtendConsumptionLicense'|'ListPurchasedLicenses'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGrantVersion(array $args = [])
 * @phpstan-method \Aws\Result createGrantVersion(array{
 *     ClientToken?: string,
 *     GrantArn?: string,
 *     GrantName?: string,
 *     AllowedOperations?: list<'CheckInLicense'|'CheckoutBorrowLicense'|'CheckoutLicense'|'CreateGrant'|'CreateToken'|'ExtendConsumptionLicense'|'ListPurchasedLicenses'>,
 *     Status?: 'ACTIVE'|'DELETED'|'DISABLED'|'FAILED_WORKFLOW'|'PENDING_ACCEPT'|'PENDING_DELETE'|'PENDING_WORKFLOW'|'REJECTED'|'WORKFLOW_COMPLETED',
 *     StatusReason?: string,
 *     SourceVersion?: string,
 *     Options?: array{ActivationOverrideBehavior?: 'ALL_GRANTS_PERMITTED_BY_ISSUER'|'DISTRIBUTED_GRANTS_ONLY', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGrantVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGrantVersionAsync(array{
 *     ClientToken?: string,
 *     GrantArn?: string,
 *     GrantName?: string,
 *     AllowedOperations?: list<'CheckInLicense'|'CheckoutBorrowLicense'|'CheckoutLicense'|'CreateGrant'|'CreateToken'|'ExtendConsumptionLicense'|'ListPurchasedLicenses'>,
 *     Status?: 'ACTIVE'|'DELETED'|'DISABLED'|'FAILED_WORKFLOW'|'PENDING_ACCEPT'|'PENDING_DELETE'|'PENDING_WORKFLOW'|'REJECTED'|'WORKFLOW_COMPLETED',
 *     StatusReason?: string,
 *     SourceVersion?: string,
 *     Options?: array{ActivationOverrideBehavior?: 'ALL_GRANTS_PERMITTED_BY_ISSUER'|'DISTRIBUTED_GRANTS_ONLY', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicense(array $args = [])
 * @phpstan-method \Aws\Result createLicense(array{
 *     LicenseName?: string,
 *     ProductName?: string,
 *     ProductSKU?: string,
 *     Issuer?: array{Name?: string, SignKey?: string, ...},
 *     HomeRegion?: string,
 *     Validity?: array{Begin?: string, End?: string, ...},
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         MaxCount?: int,
 *         Overage?: bool,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         AllowCheckIn?: bool,
 *         ...,
 *     }>,
 *     Beneficiary?: string,
 *     ConsumptionConfiguration?: array{
 *         RenewType?: 'Monthly'|'None'|'Weekly',
 *         ProvisionalConfiguration?: array{MaxTimeToLiveInMinutes?: int, ...},
 *         BorrowConfiguration?: array{AllowEarlyCheckIn?: bool, MaxTimeToLiveInMinutes?: int, ...},
 *         ...,
 *     },
 *     LicenseMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseAsync(array{
 *     LicenseName?: string,
 *     ProductName?: string,
 *     ProductSKU?: string,
 *     Issuer?: array{Name?: string, SignKey?: string, ...},
 *     HomeRegion?: string,
 *     Validity?: array{Begin?: string, End?: string, ...},
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         MaxCount?: int,
 *         Overage?: bool,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         AllowCheckIn?: bool,
 *         ...,
 *     }>,
 *     Beneficiary?: string,
 *     ConsumptionConfiguration?: array{
 *         RenewType?: 'Monthly'|'None'|'Weekly',
 *         ProvisionalConfiguration?: array{MaxTimeToLiveInMinutes?: int, ...},
 *         BorrowConfiguration?: array{AllowEarlyCheckIn?: bool, MaxTimeToLiveInMinutes?: int, ...},
 *         ...,
 *     },
 *     LicenseMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseAssetGroup(array $args = [])
 * @phpstan-method \Aws\Result createLicenseAssetGroup(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseAssetGroupConfigurations?: list<array{UsageDimension?: string, ...}>,
 *     AssociatedLicenseAssetRulesetARNs?: list<string>,
 *     Properties?: list<array{Key?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseAssetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseAssetGroupAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseAssetGroupConfigurations?: list<array{UsageDimension?: string, ...}>,
 *     AssociatedLicenseAssetRulesetARNs?: list<string>,
 *     Properties?: list<array{Key?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseAssetRuleset(array $args = [])
 * @phpstan-method \Aws\Result createLicenseAssetRuleset(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{RuleStatement?: array, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseAssetRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseAssetRulesetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{RuleStatement?: array, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createLicenseConfiguration(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseCountingType?: 'Core'|'Instance'|'Socket'|'vCPU',
 *     LicenseCount?: int,
 *     LicenseCountHardLimit?: bool,
 *     LicenseRules?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DisassociateWhenNotFound?: bool,
 *     ProductInformationList?: list<array{ResourceType?: string, ProductInformationFilterList?: list<array>, ...}>,
 *     LicenseExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseConfigurationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseCountingType?: 'Core'|'Instance'|'Socket'|'vCPU',
 *     LicenseCount?: int,
 *     LicenseCountHardLimit?: bool,
 *     LicenseRules?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DisassociateWhenNotFound?: bool,
 *     ProductInformationList?: list<array{ResourceType?: string, ProductInformationFilterList?: list<array>, ...}>,
 *     LicenseExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseConversionTaskForResource(array $args = [])
 * @phpstan-method \Aws\Result createLicenseConversionTaskForResource(array{
 *     ResourceArn?: string,
 *     SourceLicenseContext?: array{UsageOperation?: string, ProductCodes?: list<array>, ...},
 *     DestinationLicenseContext?: array{UsageOperation?: string, ProductCodes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseConversionTaskForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseConversionTaskForResourceAsync(array{
 *     ResourceArn?: string,
 *     SourceLicenseContext?: array{UsageOperation?: string, ProductCodes?: list<array>, ...},
 *     DestinationLicenseContext?: array{UsageOperation?: string, ProductCodes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseManagerReportGenerator(array $args = [])
 * @phpstan-method \Aws\Result createLicenseManagerReportGenerator(array{
 *     ReportGeneratorName?: string,
 *     Type?: list<'LicenseAssetGroupUsageReport'|'LicenseConfigurationSummaryReport'|'LicenseConfigurationUsageReport'>,
 *     ReportContext?: array{
 *         licenseConfigurationArns?: list<string>,
 *         licenseAssetGroupArns?: list<string>,
 *         reportStartDate?: int|string|\DateTimeInterface,
 *         reportEndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ReportFrequency?: array{value?: int, period?: 'DAY'|'MONTH'|'ONE_TIME'|'WEEK', ...},
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseManagerReportGeneratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseManagerReportGeneratorAsync(array{
 *     ReportGeneratorName?: string,
 *     Type?: list<'LicenseAssetGroupUsageReport'|'LicenseConfigurationSummaryReport'|'LicenseConfigurationUsageReport'>,
 *     ReportContext?: array{
 *         licenseConfigurationArns?: list<string>,
 *         licenseAssetGroupArns?: list<string>,
 *         reportStartDate?: int|string|\DateTimeInterface,
 *         reportEndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ReportFrequency?: array{value?: int, period?: 'DAY'|'MONTH'|'ONE_TIME'|'WEEK', ...},
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseVersion(array $args = [])
 * @phpstan-method \Aws\Result createLicenseVersion(array{
 *     LicenseArn?: string,
 *     LicenseName?: string,
 *     ProductName?: string,
 *     Issuer?: array{Name?: string, SignKey?: string, ...},
 *     HomeRegion?: string,
 *     Validity?: array{Begin?: string, End?: string, ...},
 *     LicenseMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         MaxCount?: int,
 *         Overage?: bool,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         AllowCheckIn?: bool,
 *         ...,
 *     }>,
 *     ConsumptionConfiguration?: array{
 *         RenewType?: 'Monthly'|'None'|'Weekly',
 *         ProvisionalConfiguration?: array{MaxTimeToLiveInMinutes?: int, ...},
 *         BorrowConfiguration?: array{AllowEarlyCheckIn?: bool, MaxTimeToLiveInMinutes?: int, ...},
 *         ...,
 *     },
 *     Status?: 'AVAILABLE'|'DEACTIVATED'|'DELETED'|'EXPIRED'|'PENDING_AVAILABLE'|'PENDING_DELETE'|'SUSPENDED',
 *     ClientToken?: string,
 *     SourceVersion?: string,
 *     ResetUsage?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseVersionAsync(array{
 *     LicenseArn?: string,
 *     LicenseName?: string,
 *     ProductName?: string,
 *     Issuer?: array{Name?: string, SignKey?: string, ...},
 *     HomeRegion?: string,
 *     Validity?: array{Begin?: string, End?: string, ...},
 *     LicenseMetadata?: list<array{Name?: string, Value?: string, ...}>,
 *     Entitlements?: list<array{
 *         Name?: string,
 *         Value?: string,
 *         MaxCount?: int,
 *         Overage?: bool,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         AllowCheckIn?: bool,
 *         ...,
 *     }>,
 *     ConsumptionConfiguration?: array{
 *         RenewType?: 'Monthly'|'None'|'Weekly',
 *         ProvisionalConfiguration?: array{MaxTimeToLiveInMinutes?: int, ...},
 *         BorrowConfiguration?: array{AllowEarlyCheckIn?: bool, MaxTimeToLiveInMinutes?: int, ...},
 *         ...,
 *     },
 *     Status?: 'AVAILABLE'|'DEACTIVATED'|'DELETED'|'EXPIRED'|'PENDING_AVAILABLE'|'PENDING_DELETE'|'SUSPENDED',
 *     ClientToken?: string,
 *     SourceVersion?: string,
 *     ResetUsage?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createToken(array $args = [])
 * @phpstan-method \Aws\Result createToken(array{
 *     LicenseArn?: string,
 *     RoleArns?: list<string>,
 *     ExpirationInDays?: int,
 *     TokenProperties?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTokenAsync(array{
 *     LicenseArn?: string,
 *     RoleArns?: list<string>,
 *     ExpirationInDays?: int,
 *     TokenProperties?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteGrant(array{GrantArn?: string, StatusReason?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGrantAsync(array{GrantArn?: string, StatusReason?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result deleteLicense(array $args = [])
 * @phpstan-method \Aws\Result deleteLicense(array{LicenseArn?: string, SourceVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseAsync(array{LicenseArn?: string, SourceVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteLicenseAssetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseAssetGroup(array{LicenseAssetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseAssetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseAssetGroupAsync(array{LicenseAssetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLicenseAssetRuleset(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseAssetRuleset(array{LicenseAssetRulesetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseAssetRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseAssetRulesetAsync(array{LicenseAssetRulesetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseConfiguration(array{LicenseConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseConfigurationAsync(array{LicenseConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLicenseManagerReportGenerator(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseManagerReportGenerator(array{LicenseManagerReportGeneratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseManagerReportGeneratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseManagerReportGeneratorAsync(array{LicenseManagerReportGeneratorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteToken(array $args = [])
 * @phpstan-method \Aws\Result deleteToken(array{TokenId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTokenAsync(array{TokenId?: string, ...} $args = [])
 * @method \Aws\Result extendLicenseConsumption(array $args = [])
 * @phpstan-method \Aws\Result extendLicenseConsumption(array{LicenseConsumptionToken?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise extendLicenseConsumptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise extendLicenseConsumptionAsync(array{LicenseConsumptionToken?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result getAccessToken(array $args = [])
 * @phpstan-method \Aws\Result getAccessToken(array{Token?: string, TokenProperties?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array{Token?: string, TokenProperties?: list<string>, ...} $args = [])
 * @method \Aws\Result getGrant(array $args = [])
 * @phpstan-method \Aws\Result getGrant(array{GrantArn?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGrantAsync(array{GrantArn?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getLicense(array $args = [])
 * @phpstan-method \Aws\Result getLicense(array{LicenseArn?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseAsync(array{LicenseArn?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getLicenseAssetGroup(array $args = [])
 * @phpstan-method \Aws\Result getLicenseAssetGroup(array{LicenseAssetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseAssetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseAssetGroupAsync(array{LicenseAssetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result getLicenseAssetRuleset(array $args = [])
 * @phpstan-method \Aws\Result getLicenseAssetRuleset(array{LicenseAssetRulesetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseAssetRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseAssetRulesetAsync(array{LicenseAssetRulesetArn?: string, ...} $args = [])
 * @method \Aws\Result getLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLicenseConfiguration(array{LicenseConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseConfigurationAsync(array{LicenseConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result getLicenseConversionTask(array $args = [])
 * @phpstan-method \Aws\Result getLicenseConversionTask(array{LicenseConversionTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseConversionTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseConversionTaskAsync(array{LicenseConversionTaskId?: string, ...} $args = [])
 * @method \Aws\Result getLicenseManagerReportGenerator(array $args = [])
 * @phpstan-method \Aws\Result getLicenseManagerReportGenerator(array{LicenseManagerReportGeneratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseManagerReportGeneratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseManagerReportGeneratorAsync(array{LicenseManagerReportGeneratorArn?: string, ...} $args = [])
 * @method \Aws\Result getLicenseUsage(array $args = [])
 * @phpstan-method \Aws\Result getLicenseUsage(array{LicenseArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseUsageAsync(array{LicenseArn?: string, ...} $args = [])
 * @method \Aws\Result getServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result getServiceSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSettingsAsync(array{...} $args = [])
 * @method \Aws\Result listAssetsForLicenseAssetGroup(array $args = [])
 * @phpstan-method \Aws\Result listAssetsForLicenseAssetGroup(array{LicenseAssetGroupArn?: string, AssetType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsForLicenseAssetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetsForLicenseAssetGroupAsync(array{LicenseAssetGroupArn?: string, AssetType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssociationsForLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result listAssociationsForLicenseConfiguration(array{LicenseConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsForLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationsForLicenseConfigurationAsync(array{LicenseConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDistributedGrants(array $args = [])
 * @phpstan-method \Aws\Result listDistributedGrants(array{
 *     GrantArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributedGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributedGrantsAsync(array{
 *     GrantArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFailuresForLicenseConfigurationOperations(array $args = [])
 * @phpstan-method \Aws\Result listFailuresForLicenseConfigurationOperations(array{LicenseConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFailuresForLicenseConfigurationOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFailuresForLicenseConfigurationOperationsAsync(array{LicenseConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLicenseAssetGroups(array $args = [])
 * @phpstan-method \Aws\Result listLicenseAssetGroups(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseAssetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseAssetGroupsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseAssetRulesets(array $args = [])
 * @phpstan-method \Aws\Result listLicenseAssetRulesets(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ShowAWSManagedLicenseAssetRulesets?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseAssetRulesetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseAssetRulesetsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ShowAWSManagedLicenseAssetRulesets?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listLicenseConfigurations(array{
 *     LicenseConfigurationArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseConfigurationsAsync(array{
 *     LicenseConfigurationArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseConfigurationsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listLicenseConfigurationsForOrganization(array{
 *     LicenseConfigurationArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseConfigurationsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseConfigurationsForOrganizationAsync(array{
 *     LicenseConfigurationArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseConversionTasks(array $args = [])
 * @phpstan-method \Aws\Result listLicenseConversionTasks(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseConversionTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseConversionTasksAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseManagerReportGenerators(array $args = [])
 * @phpstan-method \Aws\Result listLicenseManagerReportGenerators(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseManagerReportGeneratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseManagerReportGeneratorsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseSpecificationsForResource(array $args = [])
 * @phpstan-method \Aws\Result listLicenseSpecificationsForResource(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseSpecificationsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseSpecificationsForResourceAsync(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLicenseVersions(array $args = [])
 * @phpstan-method \Aws\Result listLicenseVersions(array{LicenseArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseVersionsAsync(array{LicenseArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listLicenses(array $args = [])
 * @phpstan-method \Aws\Result listLicenses(array{
 *     LicenseArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicensesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicensesAsync(array{
 *     LicenseArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReceivedGrants(array $args = [])
 * @phpstan-method \Aws\Result listReceivedGrants(array{
 *     GrantArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceivedGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceivedGrantsAsync(array{
 *     GrantArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReceivedGrantsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listReceivedGrantsForOrganization(array{
 *     LicenseArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceivedGrantsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceivedGrantsForOrganizationAsync(array{
 *     LicenseArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReceivedLicenses(array $args = [])
 * @phpstan-method \Aws\Result listReceivedLicenses(array{
 *     LicenseArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceivedLicensesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceivedLicensesAsync(array{
 *     LicenseArns?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReceivedLicensesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listReceivedLicensesForOrganization(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceivedLicensesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceivedLicensesForOrganizationAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceInventory(array $args = [])
 * @phpstan-method \Aws\Result listResourceInventory(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Condition?: 'BEGINS_WITH'|'CONTAINS'|'EQUALS'|'NOT_EQUALS', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceInventoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceInventoryAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Condition?: 'BEGINS_WITH'|'CONTAINS'|'EQUALS'|'NOT_EQUALS', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTokens(array $args = [])
 * @phpstan-method \Aws\Result listTokens(array{
 *     TokenIds?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTokensAsync(array{
 *     TokenIds?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUsageForLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result listUsageForLicenseConfiguration(array{
 *     LicenseConfigurationArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsageForLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsageForLicenseConfigurationAsync(array{
 *     LicenseConfigurationArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectGrant(array $args = [])
 * @phpstan-method \Aws\Result rejectGrant(array{GrantArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectGrantAsync(array{GrantArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLicenseAssetGroup(array $args = [])
 * @phpstan-method \Aws\Result updateLicenseAssetGroup(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseAssetGroupConfigurations?: list<array{UsageDimension?: string, ...}>,
 *     AssociatedLicenseAssetRulesetARNs?: list<string>,
 *     Properties?: list<array{Key?: string, Value?: string, ...}>,
 *     LicenseAssetGroupArn?: string,
 *     Status?: 'ACTIVE'|'DELETED'|'DISABLED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLicenseAssetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLicenseAssetGroupAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     LicenseAssetGroupConfigurations?: list<array{UsageDimension?: string, ...}>,
 *     AssociatedLicenseAssetRulesetARNs?: list<string>,
 *     Properties?: list<array{Key?: string, Value?: string, ...}>,
 *     LicenseAssetGroupArn?: string,
 *     Status?: 'ACTIVE'|'DELETED'|'DISABLED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLicenseAssetRuleset(array $args = [])
 * @phpstan-method \Aws\Result updateLicenseAssetRuleset(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{RuleStatement?: array, ...}>,
 *     LicenseAssetRulesetArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLicenseAssetRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLicenseAssetRulesetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{RuleStatement?: array, ...}>,
 *     LicenseAssetRulesetArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLicenseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLicenseConfiguration(array{
 *     LicenseConfigurationArn?: string,
 *     LicenseConfigurationStatus?: 'AVAILABLE'|'DISABLED',
 *     LicenseRules?: list<string>,
 *     LicenseCount?: int,
 *     LicenseCountHardLimit?: bool,
 *     Name?: string,
 *     Description?: string,
 *     ProductInformationList?: list<array{ResourceType?: string, ProductInformationFilterList?: list<array>, ...}>,
 *     DisassociateWhenNotFound?: bool,
 *     LicenseExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLicenseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLicenseConfigurationAsync(array{
 *     LicenseConfigurationArn?: string,
 *     LicenseConfigurationStatus?: 'AVAILABLE'|'DISABLED',
 *     LicenseRules?: list<string>,
 *     LicenseCount?: int,
 *     LicenseCountHardLimit?: bool,
 *     Name?: string,
 *     Description?: string,
 *     ProductInformationList?: list<array{ResourceType?: string, ProductInformationFilterList?: list<array>, ...}>,
 *     DisassociateWhenNotFound?: bool,
 *     LicenseExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLicenseManagerReportGenerator(array $args = [])
 * @phpstan-method \Aws\Result updateLicenseManagerReportGenerator(array{
 *     LicenseManagerReportGeneratorArn?: string,
 *     ReportGeneratorName?: string,
 *     Type?: list<'LicenseAssetGroupUsageReport'|'LicenseConfigurationSummaryReport'|'LicenseConfigurationUsageReport'>,
 *     ReportContext?: array{
 *         licenseConfigurationArns?: list<string>,
 *         licenseAssetGroupArns?: list<string>,
 *         reportStartDate?: int|string|\DateTimeInterface,
 *         reportEndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ReportFrequency?: array{value?: int, period?: 'DAY'|'MONTH'|'ONE_TIME'|'WEEK', ...},
 *     ClientToken?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLicenseManagerReportGeneratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLicenseManagerReportGeneratorAsync(array{
 *     LicenseManagerReportGeneratorArn?: string,
 *     ReportGeneratorName?: string,
 *     Type?: list<'LicenseAssetGroupUsageReport'|'LicenseConfigurationSummaryReport'|'LicenseConfigurationUsageReport'>,
 *     ReportContext?: array{
 *         licenseConfigurationArns?: list<string>,
 *         licenseAssetGroupArns?: list<string>,
 *         reportStartDate?: int|string|\DateTimeInterface,
 *         reportEndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ReportFrequency?: array{value?: int, period?: 'DAY'|'MONTH'|'ONE_TIME'|'WEEK', ...},
 *     ClientToken?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLicenseSpecificationsForResource(array $args = [])
 * @phpstan-method \Aws\Result updateLicenseSpecificationsForResource(array{
 *     ResourceArn?: string,
 *     AddLicenseSpecifications?: list<array{LicenseConfigurationArn?: string, AmiAssociationScope?: string, ...}>,
 *     RemoveLicenseSpecifications?: list<array{LicenseConfigurationArn?: string, AmiAssociationScope?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLicenseSpecificationsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLicenseSpecificationsForResourceAsync(array{
 *     ResourceArn?: string,
 *     AddLicenseSpecifications?: list<array{LicenseConfigurationArn?: string, AmiAssociationScope?: string, ...}>,
 *     RemoveLicenseSpecifications?: list<array{LicenseConfigurationArn?: string, AmiAssociationScope?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSettings(array{
 *     S3BucketArn?: string,
 *     SnsTopicArn?: string,
 *     OrganizationConfiguration?: array{EnableIntegration?: bool, ...},
 *     EnableCrossAccountsDiscovery?: bool,
 *     EnabledDiscoverySourceRegions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array{
 *     S3BucketArn?: string,
 *     SnsTopicArn?: string,
 *     OrganizationConfiguration?: array{EnableIntegration?: bool, ...},
 *     EnableCrossAccountsDiscovery?: bool,
 *     EnabledDiscoverySourceRegions?: list<string>,
 *     ...,
 * } $args = [])
 */
class LicenseManagerClient extends AwsClient {}
