<?php
namespace Aws\TaxSettings;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Tax Settings** service.
 * @method \Aws\Result batchDeleteTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteTaxRegistration(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteTaxRegistrationAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetTaxExemptions(array $args = [])
 * @phpstan-method \Aws\Result batchGetTaxExemptions(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTaxExemptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTaxExemptionsAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchPutTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result batchPutTaxRegistration(array{
 *     accountIds?: list<string>,
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'CNPJ'|'CPF'|'GST'|'NIP'|'NRIC'|'PAN'|'SST'|'TIN'|'VAT',
 *         legalName?: string,
 *         legalAddress?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         sector?: 'Business'|'Government'|'Individual',
 *         additionalTaxInformation?: array{
 *             malaysiaAdditionalInfo?: array,
 *             israelAdditionalInfo?: array,
 *             estoniaAdditionalInfo?: array,
 *             canadaAdditionalInfo?: array,
 *             spainAdditionalInfo?: array,
 *             kenyaAdditionalInfo?: array,
 *             southKoreaAdditionalInfo?: array,
 *             turkeyAdditionalInfo?: array,
 *             georgiaAdditionalInfo?: array,
 *             italyAdditionalInfo?: array,
 *             romaniaAdditionalInfo?: array,
 *             ukraineAdditionalInfo?: array,
 *             polandAdditionalInfo?: array,
 *             saudiArabiaAdditionalInfo?: array,
 *             indonesiaAdditionalInfo?: array,
 *             vietnamAdditionalInfo?: array,
 *             egyptAdditionalInfo?: array,
 *             greeceAdditionalInfo?: array,
 *             uzbekistanAdditionalInfo?: array,
 *             philippinesAdditionalInfo?: array,
 *             belgiumAdditionalInfo?: array,
 *             chileAdditionalInfo?: array,
 *             franceAdditionalInfo?: array,
 *             ...,
 *         },
 *         verificationDetails?: array{dateOfBirth?: string, taxRegistrationDocuments?: list<array>, ...},
 *         certifiedEmailId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutTaxRegistrationAsync(array{
 *     accountIds?: list<string>,
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'CNPJ'|'CPF'|'GST'|'NIP'|'NRIC'|'PAN'|'SST'|'TIN'|'VAT',
 *         legalName?: string,
 *         legalAddress?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         sector?: 'Business'|'Government'|'Individual',
 *         additionalTaxInformation?: array{
 *             malaysiaAdditionalInfo?: array,
 *             israelAdditionalInfo?: array,
 *             estoniaAdditionalInfo?: array,
 *             canadaAdditionalInfo?: array,
 *             spainAdditionalInfo?: array,
 *             kenyaAdditionalInfo?: array,
 *             southKoreaAdditionalInfo?: array,
 *             turkeyAdditionalInfo?: array,
 *             georgiaAdditionalInfo?: array,
 *             italyAdditionalInfo?: array,
 *             romaniaAdditionalInfo?: array,
 *             ukraineAdditionalInfo?: array,
 *             polandAdditionalInfo?: array,
 *             saudiArabiaAdditionalInfo?: array,
 *             indonesiaAdditionalInfo?: array,
 *             vietnamAdditionalInfo?: array,
 *             egyptAdditionalInfo?: array,
 *             greeceAdditionalInfo?: array,
 *             uzbekistanAdditionalInfo?: array,
 *             philippinesAdditionalInfo?: array,
 *             belgiumAdditionalInfo?: array,
 *             chileAdditionalInfo?: array,
 *             franceAdditionalInfo?: array,
 *             ...,
 *         },
 *         verificationDetails?: array{dateOfBirth?: string, taxRegistrationDocuments?: list<array>, ...},
 *         certifiedEmailId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSupplementalTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result deleteSupplementalTaxRegistration(array{authorityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSupplementalTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSupplementalTaxRegistrationAsync(array{authorityId?: string, ...} $args = [])
 * @method \Aws\Result deleteTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result deleteTaxRegistration(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaxRegistrationAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getTaxExemptionTypes(array $args = [])
 * @phpstan-method \Aws\Result getTaxExemptionTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaxExemptionTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaxExemptionTypesAsync(array{...} $args = [])
 * @method \Aws\Result getTaxInheritance(array $args = [])
 * @phpstan-method \Aws\Result getTaxInheritance(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaxInheritanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaxInheritanceAsync(array{...} $args = [])
 * @method \Aws\Result getTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result getTaxRegistration(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaxRegistrationAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getTaxRegistrationDocument(array $args = [])
 * @phpstan-method \Aws\Result getTaxRegistrationDocument(array{
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     taxDocumentMetadata?: array{taxDocumentAccessToken?: string, taxDocumentName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaxRegistrationDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaxRegistrationDocumentAsync(array{
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     taxDocumentMetadata?: array{taxDocumentAccessToken?: string, taxDocumentName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSupplementalTaxRegistrations(array $args = [])
 * @phpstan-method \Aws\Result listSupplementalTaxRegistrations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupplementalTaxRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupplementalTaxRegistrationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTaxExemptions(array $args = [])
 * @phpstan-method \Aws\Result listTaxExemptions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaxExemptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaxExemptionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTaxRegistrations(array $args = [])
 * @phpstan-method \Aws\Result listTaxRegistrations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaxRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaxRegistrationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result putSupplementalTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result putSupplementalTaxRegistration(array{
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'VAT',
 *         legalName?: string,
 *         address?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSupplementalTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSupplementalTaxRegistrationAsync(array{
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'VAT',
 *         legalName?: string,
 *         address?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTaxExemption(array $args = [])
 * @phpstan-method \Aws\Result putTaxExemption(array{
 *     accountIds?: list<string>,
 *     authority?: array{country?: string, state?: string, ...},
 *     exemptionType?: string,
 *     exemptionCertificate?: array{documentName?: string, documentFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTaxExemptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTaxExemptionAsync(array{
 *     accountIds?: list<string>,
 *     authority?: array{country?: string, state?: string, ...},
 *     exemptionType?: string,
 *     exemptionCertificate?: array{documentName?: string, documentFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTaxInheritance(array $args = [])
 * @phpstan-method \Aws\Result putTaxInheritance(array{heritageStatus?: 'OptIn'|'OptOut', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putTaxInheritanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTaxInheritanceAsync(array{heritageStatus?: 'OptIn'|'OptOut', ...} $args = [])
 * @method \Aws\Result putTaxRegistration(array $args = [])
 * @phpstan-method \Aws\Result putTaxRegistration(array{
 *     accountId?: string,
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'CNPJ'|'CPF'|'GST'|'NIP'|'NRIC'|'PAN'|'SST'|'TIN'|'VAT',
 *         legalName?: string,
 *         legalAddress?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         sector?: 'Business'|'Government'|'Individual',
 *         additionalTaxInformation?: array{
 *             malaysiaAdditionalInfo?: array,
 *             israelAdditionalInfo?: array,
 *             estoniaAdditionalInfo?: array,
 *             canadaAdditionalInfo?: array,
 *             spainAdditionalInfo?: array,
 *             kenyaAdditionalInfo?: array,
 *             southKoreaAdditionalInfo?: array,
 *             turkeyAdditionalInfo?: array,
 *             georgiaAdditionalInfo?: array,
 *             italyAdditionalInfo?: array,
 *             romaniaAdditionalInfo?: array,
 *             ukraineAdditionalInfo?: array,
 *             polandAdditionalInfo?: array,
 *             saudiArabiaAdditionalInfo?: array,
 *             indonesiaAdditionalInfo?: array,
 *             vietnamAdditionalInfo?: array,
 *             egyptAdditionalInfo?: array,
 *             greeceAdditionalInfo?: array,
 *             uzbekistanAdditionalInfo?: array,
 *             philippinesAdditionalInfo?: array,
 *             belgiumAdditionalInfo?: array,
 *             chileAdditionalInfo?: array,
 *             franceAdditionalInfo?: array,
 *             ...,
 *         },
 *         verificationDetails?: array{dateOfBirth?: string, taxRegistrationDocuments?: list<array>, ...},
 *         certifiedEmailId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTaxRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTaxRegistrationAsync(array{
 *     accountId?: string,
 *     taxRegistrationEntry?: array{
 *         registrationId?: string,
 *         registrationType?: 'CNPJ'|'CPF'|'GST'|'NIP'|'NRIC'|'PAN'|'SST'|'TIN'|'VAT',
 *         legalName?: string,
 *         legalAddress?: array{
 *             addressLine1?: string,
 *             addressLine2?: string,
 *             addressLine3?: string,
 *             districtOrCounty?: string,
 *             city?: string,
 *             stateOrRegion?: string,
 *             postalCode?: string,
 *             countryCode?: string,
 *             ...,
 *         },
 *         sector?: 'Business'|'Government'|'Individual',
 *         additionalTaxInformation?: array{
 *             malaysiaAdditionalInfo?: array,
 *             israelAdditionalInfo?: array,
 *             estoniaAdditionalInfo?: array,
 *             canadaAdditionalInfo?: array,
 *             spainAdditionalInfo?: array,
 *             kenyaAdditionalInfo?: array,
 *             southKoreaAdditionalInfo?: array,
 *             turkeyAdditionalInfo?: array,
 *             georgiaAdditionalInfo?: array,
 *             italyAdditionalInfo?: array,
 *             romaniaAdditionalInfo?: array,
 *             ukraineAdditionalInfo?: array,
 *             polandAdditionalInfo?: array,
 *             saudiArabiaAdditionalInfo?: array,
 *             indonesiaAdditionalInfo?: array,
 *             vietnamAdditionalInfo?: array,
 *             egyptAdditionalInfo?: array,
 *             greeceAdditionalInfo?: array,
 *             uzbekistanAdditionalInfo?: array,
 *             philippinesAdditionalInfo?: array,
 *             belgiumAdditionalInfo?: array,
 *             chileAdditionalInfo?: array,
 *             franceAdditionalInfo?: array,
 *             ...,
 *         },
 *         verificationDetails?: array{dateOfBirth?: string, taxRegistrationDocuments?: list<array>, ...},
 *         certifiedEmailId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class TaxSettingsClient extends AwsClient {}
