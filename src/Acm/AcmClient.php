<?php
namespace Aws\Acm;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager** service.
 *
 * @method \Aws\Result addTagsToCertificate(array $args = [])
 * @phpstan-method \Aws\Result addTagsToCertificate(array{CertificateArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToCertificateAsync(array{CertificateArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createAcmeDomainValidation(array $args = [])
 * @phpstan-method \Aws\Result createAcmeDomainValidation(array{
 *     IdempotencyToken?: string,
 *     AcmeEndpointArn?: string,
 *     DomainName?: string,
 *     PrevalidationOptions?: array{DnsPrevalidation?: array{DomainScope?: array, HostedZoneId?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAcmeDomainValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAcmeDomainValidationAsync(array{
 *     IdempotencyToken?: string,
 *     AcmeEndpointArn?: string,
 *     DomainName?: string,
 *     PrevalidationOptions?: array{DnsPrevalidation?: array{DomainScope?: array, HostedZoneId?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAcmeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createAcmeEndpoint(array{
 *     IdempotencyToken?: string,
 *     AuthorizationBehavior?: 'PRE_APPROVED',
 *     Contact?: 'NOT_REQUIRED'|'REQUIRED',
 *     CertificateAuthority?: array{
 *         PublicCertificateAuthority?: array{AllowedKeyAlgorithms?: list<'EC_prime256v1'|'EC_secp384r1'|'RSA_2048'>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CertificateTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAcmeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAcmeEndpointAsync(array{
 *     IdempotencyToken?: string,
 *     AuthorizationBehavior?: 'PRE_APPROVED',
 *     Contact?: 'NOT_REQUIRED'|'REQUIRED',
 *     CertificateAuthority?: array{
 *         PublicCertificateAuthority?: array{AllowedKeyAlgorithms?: list<'EC_prime256v1'|'EC_secp384r1'|'RSA_2048'>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CertificateTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAcmeExternalAccountBinding(array $args = [])
 * @phpstan-method \Aws\Result createAcmeExternalAccountBinding(array{
 *     IdempotencyToken?: string,
 *     AcmeEndpointArn?: string,
 *     RoleArn?: string,
 *     Expiration?: array{Value?: int, Type?: 'DAYS'|'HOURS'|'MINUTES', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAcmeExternalAccountBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAcmeExternalAccountBindingAsync(array{
 *     IdempotencyToken?: string,
 *     AcmeEndpointArn?: string,
 *     RoleArn?: string,
 *     Expiration?: array{Value?: int, Type?: 'DAYS'|'HOURS'|'MINUTES', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAcmeDomainValidation(array $args = [])
 * @phpstan-method \Aws\Result deleteAcmeDomainValidation(array{AcmeDomainValidationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAcmeDomainValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAcmeDomainValidationAsync(array{AcmeDomainValidationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAcmeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteAcmeEndpoint(array{AcmeEndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAcmeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAcmeEndpointAsync(array{AcmeEndpointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAcmeExternalAccountBinding(array $args = [])
 * @phpstan-method \Aws\Result deleteAcmeExternalAccountBinding(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAcmeExternalAccountBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAcmeExternalAccountBindingAsync(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result describeAcmeAccount(array $args = [])
 * @phpstan-method \Aws\Result describeAcmeAccount(array{AcmeEndpointArn?: string, AccountUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcmeAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcmeAccountAsync(array{AcmeEndpointArn?: string, AccountUrl?: string, ...} $args = [])
 * @method \Aws\Result describeAcmeDomainValidation(array $args = [])
 * @phpstan-method \Aws\Result describeAcmeDomainValidation(array{AcmeDomainValidationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcmeDomainValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcmeDomainValidationAsync(array{AcmeDomainValidationArn?: string, ...} $args = [])
 * @method \Aws\Result describeAcmeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeAcmeEndpoint(array{AcmeEndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcmeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcmeEndpointAsync(array{AcmeEndpointArn?: string, ...} $args = [])
 * @method \Aws\Result describeAcmeExternalAccountBinding(array $args = [])
 * @phpstan-method \Aws\Result describeAcmeExternalAccountBinding(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcmeExternalAccountBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcmeExternalAccountBindingAsync(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \Aws\Result describeCertificate(array $args = [])
 * @phpstan-method \Aws\Result describeCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result exportCertificate(array $args = [])
 * @phpstan-method \Aws\Result exportCertificate(array{CertificateArn?: string, Passphrase?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportCertificateAsync(array{CertificateArn?: string, Passphrase?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result getAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAccountConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getAcmeExternalAccountBindingCredentials(array $args = [])
 * @phpstan-method \Aws\Result getAcmeExternalAccountBindingCredentials(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAcmeExternalAccountBindingCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAcmeExternalAccountBindingCredentialsAsync(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \Aws\Result getCertificate(array $args = [])
 * @phpstan-method \Aws\Result getCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result importCertificate(array $args = [])
 * @phpstan-method \Aws\Result importCertificate(array{
 *     CertificateArn?: string,
 *     Certificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     PrivateKey?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CertificateChain?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCertificateAsync(array{
 *     CertificateArn?: string,
 *     Certificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     PrivateKey?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CertificateChain?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAcmeAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAcmeAccounts(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcmeAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcmeAccountsAsync(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \Aws\Result listAcmeDomainValidations(array $args = [])
 * @phpstan-method \Aws\Result listAcmeDomainValidations(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcmeDomainValidationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcmeDomainValidationsAsync(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \Aws\Result listAcmeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listAcmeEndpoints(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcmeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcmeEndpointsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAcmeExternalAccountBindings(array $args = [])
 * @phpstan-method \Aws\Result listAcmeExternalAccountBindings(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcmeExternalAccountBindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcmeExternalAccountBindingsAsync(array{NextToken?: string, MaxResults?: int, AcmeEndpointArn?: string, ...} $args = [])
 * @method \Aws\Result listCertificates(array $args = [])
 * @phpstan-method \Aws\Result listCertificates(array{
 *     CertificateStatuses?: list<'EXPIRED'|'FAILED'|'INACTIVE'|'ISSUED'|'PENDING_VALIDATION'|'REVOKED'|'VALIDATION_TIMED_OUT'>,
 *     CertificateKeyPairOrigins?: list<'ACME'|'AWS_MANAGED'|'CUSTOMER_PROVIDED'>,
 *     Includes?: array{
 *         extendedKeyUsage?: list<'ANY'|'CODE_SIGNING'|'CUSTOM'|'EMAIL_PROTECTION'|'IPSEC_END_SYSTEM'|'IPSEC_TUNNEL'|'IPSEC_USER'|'NONE'|'OCSP_SIGNING'|'TIME_STAMPING'|'TLS_WEB_CLIENT_AUTHENTICATION'|'TLS_WEB_SERVER_AUTHENTICATION'>,
 *         keyUsage?: list<'ANY'|'CERTIFICATE_SIGNING'|'CRL_SIGNING'|'CUSTOM'|'DATA_ENCIPHERMENT'|'DECIPHER_ONLY'|'DIGITAL_SIGNATURE'|'ENCIPHER_ONLY'|'KEY_AGREEMENT'|'KEY_ENCIPHERMENT'|'NON_REPUDIATION'>,
 *         keyTypes?: list<'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'RSA_1024'|'RSA_2048'|'RSA_3072'|'RSA_4096'>,
 *         exportOption?: 'DISABLED'|'ENABLED',
 *         managedBy?: 'CLOUDFRONT',
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxItems?: int,
 *     SortBy?: 'CREATED_AT',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificatesAsync(array{
 *     CertificateStatuses?: list<'EXPIRED'|'FAILED'|'INACTIVE'|'ISSUED'|'PENDING_VALIDATION'|'REVOKED'|'VALIDATION_TIMED_OUT'>,
 *     CertificateKeyPairOrigins?: list<'ACME'|'AWS_MANAGED'|'CUSTOMER_PROVIDED'>,
 *     Includes?: array{
 *         extendedKeyUsage?: list<'ANY'|'CODE_SIGNING'|'CUSTOM'|'EMAIL_PROTECTION'|'IPSEC_END_SYSTEM'|'IPSEC_TUNNEL'|'IPSEC_USER'|'NONE'|'OCSP_SIGNING'|'TIME_STAMPING'|'TLS_WEB_CLIENT_AUTHENTICATION'|'TLS_WEB_SERVER_AUTHENTICATION'>,
 *         keyUsage?: list<'ANY'|'CERTIFICATE_SIGNING'|'CRL_SIGNING'|'CUSTOM'|'DATA_ENCIPHERMENT'|'DECIPHER_ONLY'|'DIGITAL_SIGNATURE'|'ENCIPHER_ONLY'|'KEY_AGREEMENT'|'KEY_ENCIPHERMENT'|'NON_REPUDIATION'>,
 *         keyTypes?: list<'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'RSA_1024'|'RSA_2048'|'RSA_3072'|'RSA_4096'>,
 *         exportOption?: 'DISABLED'|'ENABLED',
 *         managedBy?: 'CLOUDFRONT',
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxItems?: int,
 *     SortBy?: 'CREATED_AT',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForCertificate(array $args = [])
 * @phpstan-method \Aws\Result listTagsForCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putAccountConfiguration(array{ExpiryEvents?: array{DaysBeforeExpiry?: int, ...}, IdempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountConfigurationAsync(array{ExpiryEvents?: array{DaysBeforeExpiry?: int, ...}, IdempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromCertificate(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromCertificate(array{CertificateArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromCertificateAsync(array{CertificateArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result renewCertificate(array $args = [])
 * @phpstan-method \Aws\Result renewCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise renewCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renewCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result requestCertificate(array $args = [])
 * @phpstan-method \Aws\Result requestCertificate(array{
 *     DomainName?: string,
 *     ValidationMethod?: 'DNS'|'EMAIL'|'HTTP',
 *     SubjectAlternativeNames?: list<string>,
 *     IdempotencyToken?: string,
 *     DomainValidationOptions?: list<array{DomainName?: string, ValidationDomain?: string, ...}>,
 *     Options?: array{CertificateTransparencyLoggingPreference?: 'DISABLED'|'ENABLED', Export?: 'DISABLED'|'ENABLED', ...},
 *     CertificateAuthorityArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KeyAlgorithm?: 'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'RSA_1024'|'RSA_2048'|'RSA_3072'|'RSA_4096',
 *     ManagedBy?: 'CLOUDFRONT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise requestCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestCertificateAsync(array{
 *     DomainName?: string,
 *     ValidationMethod?: 'DNS'|'EMAIL'|'HTTP',
 *     SubjectAlternativeNames?: list<string>,
 *     IdempotencyToken?: string,
 *     DomainValidationOptions?: list<array{DomainName?: string, ValidationDomain?: string, ...}>,
 *     Options?: array{CertificateTransparencyLoggingPreference?: 'DISABLED'|'ENABLED', Export?: 'DISABLED'|'ENABLED', ...},
 *     CertificateAuthorityArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KeyAlgorithm?: 'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'RSA_1024'|'RSA_2048'|'RSA_3072'|'RSA_4096',
 *     ManagedBy?: 'CLOUDFRONT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result resendValidationEmail(array $args = [])
 * @phpstan-method \Aws\Result resendValidationEmail(array{CertificateArn?: string, Domain?: string, ValidationDomain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resendValidationEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resendValidationEmailAsync(array{CertificateArn?: string, Domain?: string, ValidationDomain?: string, ...} $args = [])
 * @method \Aws\Result revokeAcmeAccount(array $args = [])
 * @phpstan-method \Aws\Result revokeAcmeAccount(array{AcmeEndpointArn?: string, AccountUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeAcmeAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeAcmeAccountAsync(array{AcmeEndpointArn?: string, AccountUrl?: string, ...} $args = [])
 * @method \Aws\Result revokeAcmeExternalAccountBinding(array $args = [])
 * @phpstan-method \Aws\Result revokeAcmeExternalAccountBinding(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeAcmeExternalAccountBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeAcmeExternalAccountBindingAsync(array{AcmeExternalAccountBindingArn?: string, ...} $args = [])
 * @method \Aws\Result revokeCertificate(array $args = [])
 * @phpstan-method \Aws\Result revokeCertificate(array{
 *     CertificateArn?: string,
 *     RevocationReason?: 'AFFILIATION_CHANGED'|'A_A_COMPROMISE'|'CA_COMPROMISE'|'CERTIFICATE_HOLD'|'CESSATION_OF_OPERATION'|'KEY_COMPROMISE'|'PRIVILEGE_WITHDRAWN'|'REMOVE_FROM_CRL'|'SUPERCEDED'|'SUPERSEDED'|'UNSPECIFIED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeCertificateAsync(array{
 *     CertificateArn?: string,
 *     RevocationReason?: 'AFFILIATION_CHANGED'|'A_A_COMPROMISE'|'CA_COMPROMISE'|'CERTIFICATE_HOLD'|'CESSATION_OF_OPERATION'|'KEY_COMPROMISE'|'PRIVILEGE_WITHDRAWN'|'REMOVE_FROM_CRL'|'SUPERCEDED'|'SUPERSEDED'|'UNSPECIFIED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchCertificates(array $args = [])
 * @phpstan-method \Aws\Result searchCertificates(array{
 *     FilterStatement?: array{
 *         And?: list<array>,
 *         Or?: list<array>,
 *         Not?: array,
 *         Filter?: array{CertificateArn?: string, X509AttributeFilter?: array, AcmCertificateMetadataFilter?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'ACME_ACCOUNT_ID'|'ACME_ENDPOINT_ARN'|'CERTIFICATE_ARN'|'CERTIFICATE_KEY_PAIR_ORIGIN'|'COMMON_NAME'|'CREATED_AT'|'EXPORTED'|'EXPORT_OPTION'|'IMPORTED_AT'|'IN_USE'|'ISSUED_AT'|'KEY_ALGORITHM'|'MANAGED_BY'|'NOT_AFTER'|'NOT_BEFORE'|'RENEWAL_ELIGIBILITY'|'RENEWAL_STATUS'|'REVOKED_AT'|'STATUS'|'TYPE'|'VALIDATION_METHOD',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchCertificatesAsync(array{
 *     FilterStatement?: array{
 *         And?: list<array>,
 *         Or?: list<array>,
 *         Not?: array,
 *         Filter?: array{CertificateArn?: string, X509AttributeFilter?: array, AcmCertificateMetadataFilter?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'ACME_ACCOUNT_ID'|'ACME_ENDPOINT_ARN'|'CERTIFICATE_ARN'|'CERTIFICATE_KEY_PAIR_ORIGIN'|'COMMON_NAME'|'CREATED_AT'|'EXPORTED'|'EXPORT_OPTION'|'IMPORTED_AT'|'IN_USE'|'ISSUED_AT'|'KEY_ALGORITHM'|'MANAGED_BY'|'NOT_AFTER'|'NOT_BEFORE'|'RENEWAL_ELIGIBILITY'|'RENEWAL_STATUS'|'REVOKED_AT'|'STATUS'|'TYPE'|'VALIDATION_METHOD',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAcmeDomainValidation(array $args = [])
 * @phpstan-method \Aws\Result updateAcmeDomainValidation(array{
 *     AcmeDomainValidationArn?: string,
 *     PrevalidationOptions?: array{DnsPrevalidation?: array{DomainScope?: array, HostedZoneId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAcmeDomainValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAcmeDomainValidationAsync(array{
 *     AcmeDomainValidationArn?: string,
 *     PrevalidationOptions?: array{DnsPrevalidation?: array{DomainScope?: array, HostedZoneId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAcmeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateAcmeEndpoint(array{
 *     AcmeEndpointArn?: string,
 *     AuthorizationBehavior?: 'PRE_APPROVED',
 *     Contact?: 'NOT_REQUIRED'|'REQUIRED',
 *     CertificateAuthority?: array{
 *         PublicCertificateAuthority?: array{AllowedKeyAlgorithms?: list<'EC_prime256v1'|'EC_secp384r1'|'RSA_2048'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAcmeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAcmeEndpointAsync(array{
 *     AcmeEndpointArn?: string,
 *     AuthorizationBehavior?: 'PRE_APPROVED',
 *     Contact?: 'NOT_REQUIRED'|'REQUIRED',
 *     CertificateAuthority?: array{
 *         PublicCertificateAuthority?: array{AllowedKeyAlgorithms?: list<'EC_prime256v1'|'EC_secp384r1'|'RSA_2048'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCertificateOptions(array $args = [])
 * @phpstan-method \Aws\Result updateCertificateOptions(array{
 *     CertificateArn?: string,
 *     Options?: array{CertificateTransparencyLoggingPreference?: 'DISABLED'|'ENABLED', Export?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCertificateOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCertificateOptionsAsync(array{
 *     CertificateArn?: string,
 *     Options?: array{CertificateTransparencyLoggingPreference?: 'DISABLED'|'ENABLED', Export?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 */
class AcmClient extends AwsClient {}
