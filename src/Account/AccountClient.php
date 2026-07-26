<?php
namespace Aws\Account;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Account** service.
 * @method \Aws\Result acceptPrimaryEmailUpdate(array $args = [])
 * @phpstan-method \Aws\Result acceptPrimaryEmailUpdate(array{AccountId?: string, PrimaryEmail?: string, Otp?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPrimaryEmailUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptPrimaryEmailUpdateAsync(array{AccountId?: string, PrimaryEmail?: string, Otp?: string, ...} $args = [])
 * @method \Aws\Result deleteAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result deleteAlternateContact(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlternateContactAsync(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \Aws\Result disableRegion(array $args = [])
 * @phpstan-method \Aws\Result disableRegion(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableRegionAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result enableRegion(array $args = [])
 * @phpstan-method \Aws\Result enableRegion(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableRegionAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result getAccountInformation(array $args = [])
 * @phpstan-method \Aws\Result getAccountInformation(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountInformationAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result getAlternateContact(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAlternateContactAsync(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \Aws\Result getContactInformation(array $args = [])
 * @phpstan-method \Aws\Result getContactInformation(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactInformationAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getGovCloudAccountInformation(array $args = [])
 * @phpstan-method \Aws\Result getGovCloudAccountInformation(array{StandardAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGovCloudAccountInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGovCloudAccountInformationAsync(array{StandardAccountId?: string, ...} $args = [])
 * @method \Aws\Result getPrimaryEmail(array $args = [])
 * @phpstan-method \Aws\Result getPrimaryEmail(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPrimaryEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrimaryEmailAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getRegionOptStatus(array $args = [])
 * @phpstan-method \Aws\Result getRegionOptStatus(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegionOptStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegionOptStatusAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result listRegions(array $args = [])
 * @phpstan-method \Aws\Result listRegions(array{
 *     AccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RegionOptStatusContains?: list<'DISABLED'|'DISABLING'|'ENABLED'|'ENABLED_BY_DEFAULT'|'ENABLING'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegionsAsync(array{
 *     AccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RegionOptStatusContains?: list<'DISABLED'|'DISABLING'|'ENABLED'|'ENABLED_BY_DEFAULT'|'ENABLING'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccountName(array $args = [])
 * @phpstan-method \Aws\Result putAccountName(array{AccountName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountNameAsync(array{AccountName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result putAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result putAlternateContact(array{
 *     Name?: string,
 *     Title?: string,
 *     EmailAddress?: string,
 *     PhoneNumber?: string,
 *     AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAlternateContactAsync(array{
 *     Name?: string,
 *     Title?: string,
 *     EmailAddress?: string,
 *     PhoneNumber?: string,
 *     AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putContactInformation(array $args = [])
 * @phpstan-method \Aws\Result putContactInformation(array{
 *     ContactInformation?: array{
 *         FullName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         PhoneNumber?: string,
 *         CompanyName?: string,
 *         WebsiteUrl?: string,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putContactInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putContactInformationAsync(array{
 *     ContactInformation?: array{
 *         FullName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         PhoneNumber?: string,
 *         CompanyName?: string,
 *         WebsiteUrl?: string,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPrimaryEmailUpdate(array $args = [])
 * @phpstan-method \Aws\Result startPrimaryEmailUpdate(array{AccountId?: string, PrimaryEmail?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startPrimaryEmailUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPrimaryEmailUpdateAsync(array{AccountId?: string, PrimaryEmail?: string, ...} $args = [])
 */
class AccountClient extends AwsClient {}
