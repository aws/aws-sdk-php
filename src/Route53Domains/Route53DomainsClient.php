<?php
namespace Aws\Route53Domains;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Domains** service.
 *
 * @method \Aws\Result acceptDomainTransferFromAnotherAwsAccount(array $args = [])
 * @phpstan-method \Aws\Result acceptDomainTransferFromAnotherAwsAccount(array{DomainName?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptDomainTransferFromAnotherAwsAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptDomainTransferFromAnotherAwsAccountAsync(array{DomainName?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result associateDelegationSignerToDomain(array $args = [])
 * @phpstan-method \Aws\Result associateDelegationSignerToDomain(array{
 *     DomainName?: string,
 *     SigningAttributes?: array{Algorithm?: int, Flags?: int, PublicKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDelegationSignerToDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDelegationSignerToDomainAsync(array{
 *     DomainName?: string,
 *     SigningAttributes?: array{Algorithm?: int, Flags?: int, PublicKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelDomainTransferToAnotherAwsAccount(array $args = [])
 * @phpstan-method \Aws\Result cancelDomainTransferToAnotherAwsAccount(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDomainTransferToAnotherAwsAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDomainTransferToAnotherAwsAccountAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result checkDomainAvailability(array $args = [])
 * @phpstan-method \Aws\Result checkDomainAvailability(array{DomainName?: string, IdnLangCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDomainAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkDomainAvailabilityAsync(array{DomainName?: string, IdnLangCode?: string, ...} $args = [])
 * @method \Aws\Result checkDomainTransferability(array $args = [])
 * @phpstan-method \Aws\Result checkDomainTransferability(array{DomainName?: string, AuthCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDomainTransferabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkDomainTransferabilityAsync(array{DomainName?: string, AuthCode?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteTagsForDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteTagsForDomain(array{DomainName?: string, TagsToDelete?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsForDomainAsync(array{DomainName?: string, TagsToDelete?: list<string>, ...} $args = [])
 * @method \Aws\Result disableDomainAutoRenew(array $args = [])
 * @phpstan-method \Aws\Result disableDomainAutoRenew(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDomainAutoRenewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDomainAutoRenewAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result disableDomainTransferLock(array $args = [])
 * @phpstan-method \Aws\Result disableDomainTransferLock(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDomainTransferLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDomainTransferLockAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result disassociateDelegationSignerFromDomain(array $args = [])
 * @phpstan-method \Aws\Result disassociateDelegationSignerFromDomain(array{DomainName?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDelegationSignerFromDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDelegationSignerFromDomainAsync(array{DomainName?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result enableDomainAutoRenew(array $args = [])
 * @phpstan-method \Aws\Result enableDomainAutoRenew(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDomainAutoRenewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDomainAutoRenewAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result enableDomainTransferLock(array $args = [])
 * @phpstan-method \Aws\Result enableDomainTransferLock(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDomainTransferLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDomainTransferLockAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result getContactReachabilityStatus(array $args = [])
 * @phpstan-method \Aws\Result getContactReachabilityStatus(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactReachabilityStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactReachabilityStatusAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result getDomainDetail(array $args = [])
 * @phpstan-method \Aws\Result getDomainDetail(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainDetailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainDetailAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result getDomainSuggestions(array $args = [])
 * @phpstan-method \Aws\Result getDomainSuggestions(array{DomainName?: string, SuggestionCount?: int, OnlyAvailable?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainSuggestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainSuggestionsAsync(array{DomainName?: string, SuggestionCount?: int, OnlyAvailable?: bool, ...} $args = [])
 * @method \Aws\Result getOperationDetail(array $args = [])
 * @phpstan-method \Aws\Result getOperationDetail(array{OperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationDetailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationDetailAsync(array{OperationId?: string, ...} $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{
 *     FilterConditions?: list<array{Name?: 'DomainName'|'Expiry', Operator?: 'BEGINS_WITH'|'GE'|'LE', Values?: list<string>, ...}>,
 *     SortCondition?: array{Name?: 'DomainName'|'Expiry', SortOrder?: 'ASC'|'DESC', ...},
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{
 *     FilterConditions?: list<array{Name?: 'DomainName'|'Expiry', Operator?: 'BEGINS_WITH'|'GE'|'LE', Values?: list<string>, ...}>,
 *     SortCondition?: array{Name?: 'DomainName'|'Expiry', SortOrder?: 'ASC'|'DESC', ...},
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @phpstan-method \Aws\Result listOperations(array{
 *     SubmittedSince?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     MaxItems?: int,
 *     Status?: list<'ERROR'|'FAILED'|'IN_PROGRESS'|'SUBMITTED'|'SUCCESSFUL'>,
 *     Type?: list<'ADD_DNSSEC'|'CHANGE_DOMAIN_OWNER'|'CHANGE_PRIVACY_PROTECTION'|'DELETE_DOMAIN'|'DISABLE_AUTORENEW'|'DOMAIN_LOCK'|'ENABLE_AUTORENEW'|'EXPIRE_DOMAIN'|'INTERNAL_TRANSFER_IN_DOMAIN'|'INTERNAL_TRANSFER_OUT_DOMAIN'|'PUSH_DOMAIN'|'REGISTER_DOMAIN'|'RELEASE_TO_GANDI'|'REMOVE_DNSSEC'|'RENEW_DOMAIN'|'RESTORE_DOMAIN'|'TRANSFER_IN_DOMAIN'|'TRANSFER_ON_RENEW'|'TRANSFER_OUT_DOMAIN'|'UPDATE_DOMAIN_CONTACT'|'UPDATE_NAMESERVER'>,
 *     SortBy?: 'SubmittedDate',
 *     SortOrder?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOperationsAsync(array{
 *     SubmittedSince?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     MaxItems?: int,
 *     Status?: list<'ERROR'|'FAILED'|'IN_PROGRESS'|'SUBMITTED'|'SUCCESSFUL'>,
 *     Type?: list<'ADD_DNSSEC'|'CHANGE_DOMAIN_OWNER'|'CHANGE_PRIVACY_PROTECTION'|'DELETE_DOMAIN'|'DISABLE_AUTORENEW'|'DOMAIN_LOCK'|'ENABLE_AUTORENEW'|'EXPIRE_DOMAIN'|'INTERNAL_TRANSFER_IN_DOMAIN'|'INTERNAL_TRANSFER_OUT_DOMAIN'|'PUSH_DOMAIN'|'REGISTER_DOMAIN'|'RELEASE_TO_GANDI'|'REMOVE_DNSSEC'|'RENEW_DOMAIN'|'RESTORE_DOMAIN'|'TRANSFER_IN_DOMAIN'|'TRANSFER_ON_RENEW'|'TRANSFER_OUT_DOMAIN'|'UPDATE_DOMAIN_CONTACT'|'UPDATE_NAMESERVER'>,
 *     SortBy?: 'SubmittedDate',
 *     SortOrder?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPrices(array $args = [])
 * @phpstan-method \Aws\Result listPrices(array{Tld?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPricesAsync(array{Tld?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listTagsForDomain(array $args = [])
 * @phpstan-method \Aws\Result listTagsForDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result pushDomain(array $args = [])
 * @phpstan-method \Aws\Result pushDomain(array{DomainName?: string, Target?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pushDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pushDomainAsync(array{DomainName?: string, Target?: string, ...} $args = [])
 * @method \Aws\Result registerDomain(array $args = [])
 * @phpstan-method \Aws\Result registerDomain(array{
 *     DomainName?: string,
 *     IdnLangCode?: string,
 *     DurationInYears?: int,
 *     AutoRenew?: bool,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectAdminContact?: bool,
 *     PrivacyProtectRegistrantContact?: bool,
 *     PrivacyProtectTechContact?: bool,
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectBillingContact?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDomainAsync(array{
 *     DomainName?: string,
 *     IdnLangCode?: string,
 *     DurationInYears?: int,
 *     AutoRenew?: bool,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectAdminContact?: bool,
 *     PrivacyProtectRegistrantContact?: bool,
 *     PrivacyProtectTechContact?: bool,
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectBillingContact?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectDomainTransferFromAnotherAwsAccount(array $args = [])
 * @phpstan-method \Aws\Result rejectDomainTransferFromAnotherAwsAccount(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectDomainTransferFromAnotherAwsAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectDomainTransferFromAnotherAwsAccountAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result renewDomain(array $args = [])
 * @phpstan-method \Aws\Result renewDomain(array{DomainName?: string, DurationInYears?: int, CurrentExpiryYear?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise renewDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renewDomainAsync(array{DomainName?: string, DurationInYears?: int, CurrentExpiryYear?: int, ...} $args = [])
 * @method \Aws\Result resendContactReachabilityEmail(array $args = [])
 * @phpstan-method \Aws\Result resendContactReachabilityEmail(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resendContactReachabilityEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resendContactReachabilityEmailAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result resendOperationAuthorization(array $args = [])
 * @phpstan-method \Aws\Result resendOperationAuthorization(array{OperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resendOperationAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resendOperationAuthorizationAsync(array{OperationId?: string, ...} $args = [])
 * @method \Aws\Result retrieveDomainAuthCode(array $args = [])
 * @phpstan-method \Aws\Result retrieveDomainAuthCode(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveDomainAuthCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveDomainAuthCodeAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result transferDomain(array $args = [])
 * @phpstan-method \Aws\Result transferDomain(array{
 *     DomainName?: string,
 *     IdnLangCode?: string,
 *     DurationInYears?: int,
 *     Nameservers?: list<array{Name?: string, GlueIps?: list<string>, ...}>,
 *     AuthCode?: string,
 *     AutoRenew?: bool,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectAdminContact?: bool,
 *     PrivacyProtectRegistrantContact?: bool,
 *     PrivacyProtectTechContact?: bool,
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectBillingContact?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise transferDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise transferDomainAsync(array{
 *     DomainName?: string,
 *     IdnLangCode?: string,
 *     DurationInYears?: int,
 *     Nameservers?: list<array{Name?: string, GlueIps?: list<string>, ...}>,
 *     AuthCode?: string,
 *     AutoRenew?: bool,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectAdminContact?: bool,
 *     PrivacyProtectRegistrantContact?: bool,
 *     PrivacyProtectTechContact?: bool,
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     PrivacyProtectBillingContact?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result transferDomainToAnotherAwsAccount(array $args = [])
 * @phpstan-method \Aws\Result transferDomainToAnotherAwsAccount(array{DomainName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise transferDomainToAnotherAwsAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise transferDomainToAnotherAwsAccountAsync(array{DomainName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result updateDomainContact(array $args = [])
 * @phpstan-method \Aws\Result updateDomainContact(array{
 *     DomainName?: string,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     Consent?: array{MaxPrice?: float, Currency?: string, ...},
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainContactAsync(array{
 *     DomainName?: string,
 *     AdminContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     RegistrantContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     TechContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     Consent?: array{MaxPrice?: float, Currency?: string, ...},
 *     BillingContact?: array{
 *         FirstName?: string,
 *         LastName?: string,
 *         ContactType?: 'ASSOCIATION'|'COMPANY'|'PERSON'|'PUBLIC_BODY'|'RESELLER',
 *         OrganizationName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         City?: string,
 *         State?: string,
 *         CountryCode?: 'AC'|'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AX'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BQ'|'BR'|'BS'|'BT'|'BV'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GF'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GP'|'GQ'|'GR'|'GS'|'GT'|'GU'|'GW'|'GY'|'HK'|'HM'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MQ'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NF'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PS'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'SS'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TF'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TP'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *         ZipCode?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         Fax?: string,
 *         ExtraParams?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainContactPrivacy(array $args = [])
 * @phpstan-method \Aws\Result updateDomainContactPrivacy(array{
 *     DomainName?: string,
 *     AdminPrivacy?: bool,
 *     RegistrantPrivacy?: bool,
 *     TechPrivacy?: bool,
 *     BillingPrivacy?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainContactPrivacyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainContactPrivacyAsync(array{
 *     DomainName?: string,
 *     AdminPrivacy?: bool,
 *     RegistrantPrivacy?: bool,
 *     TechPrivacy?: bool,
 *     BillingPrivacy?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainNameservers(array $args = [])
 * @phpstan-method \Aws\Result updateDomainNameservers(array{
 *     DomainName?: string,
 *     FIAuthKey?: string,
 *     Nameservers?: list<array{Name?: string, GlueIps?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainNameserversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainNameserversAsync(array{
 *     DomainName?: string,
 *     FIAuthKey?: string,
 *     Nameservers?: list<array{Name?: string, GlueIps?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTagsForDomain(array $args = [])
 * @phpstan-method \Aws\Result updateTagsForDomain(array{DomainName?: string, TagsToUpdate?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTagsForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTagsForDomainAsync(array{DomainName?: string, TagsToUpdate?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result viewBilling(array $args = [])
 * @phpstan-method \Aws\Result viewBilling(array{
 *     Start?: int|string|\DateTimeInterface,
 *     End?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise viewBillingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise viewBillingAsync(array{
 *     Start?: int|string|\DateTimeInterface,
 *     End?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 */
class Route53DomainsClient extends AwsClient {}
