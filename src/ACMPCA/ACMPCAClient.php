<?php
namespace Aws\ACMPCA;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager Private Certificate Authority** service.
 * @method \Aws\Result createCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result createCertificateAuthority(array{
 *     CertificateAuthorityConfiguration?: array{
 *         KeyAlgorithm?: 'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *         SigningAlgorithm?: 'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'SHA256WITHECDSA'|'SHA256WITHRSA'|'SHA384WITHECDSA'|'SHA384WITHRSA'|'SHA512WITHECDSA'|'SHA512WITHRSA'|'SM3WITHSM2',
 *         Subject?: array{
 *             Country?: string,
 *             Organization?: string,
 *             OrganizationalUnit?: string,
 *             DistinguishedNameQualifier?: string,
 *             State?: string,
 *             CommonName?: string,
 *             SerialNumber?: string,
 *             Locality?: string,
 *             Title?: string,
 *             Surname?: string,
 *             GivenName?: string,
 *             Initials?: string,
 *             Pseudonym?: string,
 *             GenerationQualifier?: string,
 *             CustomAttributes?: list<array>,
 *             ...,
 *         },
 *         CsrExtensions?: array{KeyUsage?: array, SubjectInformationAccess?: list<array>, ...},
 *         ...,
 *     },
 *     RevocationConfiguration?: array{
 *         CrlConfiguration?: array{
 *             Enabled?: bool,
 *             ExpirationInDays?: int,
 *             CustomCname?: string,
 *             S3BucketName?: string,
 *             S3ObjectAcl?: 'BUCKET_OWNER_FULL_CONTROL'|'PUBLIC_READ',
 *             CrlDistributionPointExtensionConfiguration?: array,
 *             CrlType?: 'COMPLETE'|'PARTITIONED',
 *             CustomPath?: string,
 *             ...,
 *         },
 *         OcspConfiguration?: array{Enabled?: bool, OcspCustomCname?: string, ...},
 *         ...,
 *     },
 *     CertificateAuthorityType?: 'ROOT'|'SUBORDINATE',
 *     IdempotencyToken?: string,
 *     KeyStorageSecurityStandard?: 'CCPC_LEVEL_1_OR_HIGHER'|'FIPS_140_2_LEVEL_2_OR_HIGHER'|'FIPS_140_2_LEVEL_3_OR_HIGHER',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UsageMode?: 'GENERAL_PURPOSE'|'SHORT_LIVED_CERTIFICATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCertificateAuthorityAsync(array{
 *     CertificateAuthorityConfiguration?: array{
 *         KeyAlgorithm?: 'EC_prime256v1'|'EC_secp384r1'|'EC_secp521r1'|'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *         SigningAlgorithm?: 'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'SHA256WITHECDSA'|'SHA256WITHRSA'|'SHA384WITHECDSA'|'SHA384WITHRSA'|'SHA512WITHECDSA'|'SHA512WITHRSA'|'SM3WITHSM2',
 *         Subject?: array{
 *             Country?: string,
 *             Organization?: string,
 *             OrganizationalUnit?: string,
 *             DistinguishedNameQualifier?: string,
 *             State?: string,
 *             CommonName?: string,
 *             SerialNumber?: string,
 *             Locality?: string,
 *             Title?: string,
 *             Surname?: string,
 *             GivenName?: string,
 *             Initials?: string,
 *             Pseudonym?: string,
 *             GenerationQualifier?: string,
 *             CustomAttributes?: list<array>,
 *             ...,
 *         },
 *         CsrExtensions?: array{KeyUsage?: array, SubjectInformationAccess?: list<array>, ...},
 *         ...,
 *     },
 *     RevocationConfiguration?: array{
 *         CrlConfiguration?: array{
 *             Enabled?: bool,
 *             ExpirationInDays?: int,
 *             CustomCname?: string,
 *             S3BucketName?: string,
 *             S3ObjectAcl?: 'BUCKET_OWNER_FULL_CONTROL'|'PUBLIC_READ',
 *             CrlDistributionPointExtensionConfiguration?: array,
 *             CrlType?: 'COMPLETE'|'PARTITIONED',
 *             CustomPath?: string,
 *             ...,
 *         },
 *         OcspConfiguration?: array{Enabled?: bool, OcspCustomCname?: string, ...},
 *         ...,
 *     },
 *     CertificateAuthorityType?: 'ROOT'|'SUBORDINATE',
 *     IdempotencyToken?: string,
 *     KeyStorageSecurityStandard?: 'CCPC_LEVEL_1_OR_HIGHER'|'FIPS_140_2_LEVEL_2_OR_HIGHER'|'FIPS_140_2_LEVEL_3_OR_HIGHER',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UsageMode?: 'GENERAL_PURPOSE'|'SHORT_LIVED_CERTIFICATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCertificateAuthorityAuditReport(array $args = [])
 * @phpstan-method \Aws\Result createCertificateAuthorityAuditReport(array{CertificateAuthorityArn?: string, S3BucketName?: string, AuditReportResponseFormat?: 'CSV'|'JSON', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCertificateAuthorityAuditReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCertificateAuthorityAuditReportAsync(array{CertificateAuthorityArn?: string, S3BucketName?: string, AuditReportResponseFormat?: 'CSV'|'JSON', ...} $args = [])
 * @method \Aws\Result createPermission(array $args = [])
 * @phpstan-method \Aws\Result createPermission(array{
 *     CertificateAuthorityArn?: string,
 *     Principal?: string,
 *     SourceAccount?: string,
 *     Actions?: list<'GetCertificate'|'IssueCertificate'|'ListPermissions'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPermissionAsync(array{
 *     CertificateAuthorityArn?: string,
 *     Principal?: string,
 *     SourceAccount?: string,
 *     Actions?: list<'GetCertificate'|'IssueCertificate'|'ListPermissions'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificateAuthority(array{CertificateAuthorityArn?: string, PermanentDeletionTimeInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAuthorityAsync(array{CertificateAuthorityArn?: string, PermanentDeletionTimeInDays?: int, ...} $args = [])
 * @method \Aws\Result deletePermission(array $args = [])
 * @phpstan-method \Aws\Result deletePermission(array{CertificateAuthorityArn?: string, Principal?: string, SourceAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionAsync(array{CertificateAuthorityArn?: string, Principal?: string, SourceAccount?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result describeCertificateAuthority(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAuthorityAsync(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result describeCertificateAuthorityAuditReport(array $args = [])
 * @phpstan-method \Aws\Result describeCertificateAuthorityAuditReport(array{CertificateAuthorityArn?: string, AuditReportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAuthorityAuditReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAuthorityAuditReportAsync(array{CertificateAuthorityArn?: string, AuditReportId?: string, ...} $args = [])
 * @method \Aws\Result getCertificate(array $args = [])
 * @phpstan-method \Aws\Result getCertificate(array{CertificateAuthorityArn?: string, CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateAsync(array{CertificateAuthorityArn?: string, CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result getCertificateAuthorityCertificate(array $args = [])
 * @phpstan-method \Aws\Result getCertificateAuthorityCertificate(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateAuthorityCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateAuthorityCertificateAsync(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result getCertificateAuthorityCsr(array $args = [])
 * @phpstan-method \Aws\Result getCertificateAuthorityCsr(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateAuthorityCsrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateAuthorityCsrAsync(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result importCertificateAuthorityCertificate(array $args = [])
 * @phpstan-method \Aws\Result importCertificateAuthorityCertificate(array{
 *     CertificateAuthorityArn?: string,
 *     Certificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CertificateChain?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCertificateAuthorityCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCertificateAuthorityCertificateAsync(array{
 *     CertificateAuthorityArn?: string,
 *     Certificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CertificateChain?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result issueCertificate(array $args = [])
 * @phpstan-method \Aws\Result issueCertificate(array{
 *     ApiPassthrough?: array{
 *         Extensions?: array{
 *             CertificatePolicies?: list<array>,
 *             ExtendedKeyUsage?: list<array>,
 *             KeyUsage?: array,
 *             SubjectAlternativeNames?: list<array>,
 *             CustomExtensions?: list<array>,
 *             ...,
 *         },
 *         Subject?: array{
 *             Country?: string,
 *             Organization?: string,
 *             OrganizationalUnit?: string,
 *             DistinguishedNameQualifier?: string,
 *             State?: string,
 *             CommonName?: string,
 *             SerialNumber?: string,
 *             Locality?: string,
 *             Title?: string,
 *             Surname?: string,
 *             GivenName?: string,
 *             Initials?: string,
 *             Pseudonym?: string,
 *             GenerationQualifier?: string,
 *             CustomAttributes?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CertificateAuthorityArn?: string,
 *     Csr?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SigningAlgorithm?: 'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'SHA256WITHECDSA'|'SHA256WITHRSA'|'SHA384WITHECDSA'|'SHA384WITHRSA'|'SHA512WITHECDSA'|'SHA512WITHRSA'|'SM3WITHSM2',
 *     TemplateArn?: string,
 *     Validity?: array{Value?: int, Type?: 'ABSOLUTE'|'DAYS'|'END_DATE'|'MONTHS'|'YEARS', ...},
 *     ValidityNotBefore?: array{Value?: int, Type?: 'ABSOLUTE'|'DAYS'|'END_DATE'|'MONTHS'|'YEARS', ...},
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise issueCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise issueCertificateAsync(array{
 *     ApiPassthrough?: array{
 *         Extensions?: array{
 *             CertificatePolicies?: list<array>,
 *             ExtendedKeyUsage?: list<array>,
 *             KeyUsage?: array,
 *             SubjectAlternativeNames?: list<array>,
 *             CustomExtensions?: list<array>,
 *             ...,
 *         },
 *         Subject?: array{
 *             Country?: string,
 *             Organization?: string,
 *             OrganizationalUnit?: string,
 *             DistinguishedNameQualifier?: string,
 *             State?: string,
 *             CommonName?: string,
 *             SerialNumber?: string,
 *             Locality?: string,
 *             Title?: string,
 *             Surname?: string,
 *             GivenName?: string,
 *             Initials?: string,
 *             Pseudonym?: string,
 *             GenerationQualifier?: string,
 *             CustomAttributes?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CertificateAuthorityArn?: string,
 *     Csr?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SigningAlgorithm?: 'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'SHA256WITHECDSA'|'SHA256WITHRSA'|'SHA384WITHECDSA'|'SHA384WITHRSA'|'SHA512WITHECDSA'|'SHA512WITHRSA'|'SM3WITHSM2',
 *     TemplateArn?: string,
 *     Validity?: array{Value?: int, Type?: 'ABSOLUTE'|'DAYS'|'END_DATE'|'MONTHS'|'YEARS', ...},
 *     ValidityNotBefore?: array{Value?: int, Type?: 'ABSOLUTE'|'DAYS'|'END_DATE'|'MONTHS'|'YEARS', ...},
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCertificateAuthorities(array $args = [])
 * @phpstan-method \Aws\Result listCertificateAuthorities(array{MaxResults?: int, NextToken?: string, ResourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificateAuthoritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificateAuthoritiesAsync(array{MaxResults?: int, NextToken?: string, ResourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \Aws\Result listPermissions(array $args = [])
 * @phpstan-method \Aws\Result listPermissions(array{MaxResults?: int, NextToken?: string, CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionsAsync(array{MaxResults?: int, NextToken?: string, CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{MaxResults?: int, NextToken?: string, CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{MaxResults?: int, NextToken?: string, CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result putPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result restoreCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result restoreCertificateAuthority(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreCertificateAuthorityAsync(array{CertificateAuthorityArn?: string, ...} $args = [])
 * @method \Aws\Result revokeCertificate(array $args = [])
 * @phpstan-method \Aws\Result revokeCertificate(array{
 *     CertificateAuthorityArn?: string,
 *     CertificateSerial?: string,
 *     RevocationReason?: 'AFFILIATION_CHANGED'|'A_A_COMPROMISE'|'CERTIFICATE_AUTHORITY_COMPROMISE'|'CESSATION_OF_OPERATION'|'KEY_COMPROMISE'|'PRIVILEGE_WITHDRAWN'|'SUPERSEDED'|'UNSPECIFIED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeCertificateAsync(array{
 *     CertificateAuthorityArn?: string,
 *     CertificateSerial?: string,
 *     RevocationReason?: 'AFFILIATION_CHANGED'|'A_A_COMPROMISE'|'CERTIFICATE_AUTHORITY_COMPROMISE'|'CESSATION_OF_OPERATION'|'KEY_COMPROMISE'|'PRIVILEGE_WITHDRAWN'|'SUPERSEDED'|'UNSPECIFIED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result tagCertificateAuthority(array{CertificateAuthorityArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagCertificateAuthorityAsync(array{CertificateAuthorityArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result untagCertificateAuthority(array{CertificateAuthorityArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagCertificateAuthorityAsync(array{CertificateAuthorityArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result updateCertificateAuthority(array{
 *     CertificateAuthorityArn?: string,
 *     RevocationConfiguration?: array{
 *         CrlConfiguration?: array{
 *             Enabled?: bool,
 *             ExpirationInDays?: int,
 *             CustomCname?: string,
 *             S3BucketName?: string,
 *             S3ObjectAcl?: 'BUCKET_OWNER_FULL_CONTROL'|'PUBLIC_READ',
 *             CrlDistributionPointExtensionConfiguration?: array,
 *             CrlType?: 'COMPLETE'|'PARTITIONED',
 *             CustomPath?: string,
 *             ...,
 *         },
 *         OcspConfiguration?: array{Enabled?: bool, OcspCustomCname?: string, ...},
 *         ...,
 *     },
 *     Status?: 'ACTIVE'|'CREATING'|'DELETED'|'DISABLED'|'EXPIRED'|'FAILED'|'PENDING_CERTIFICATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCertificateAuthorityAsync(array{
 *     CertificateAuthorityArn?: string,
 *     RevocationConfiguration?: array{
 *         CrlConfiguration?: array{
 *             Enabled?: bool,
 *             ExpirationInDays?: int,
 *             CustomCname?: string,
 *             S3BucketName?: string,
 *             S3ObjectAcl?: 'BUCKET_OWNER_FULL_CONTROL'|'PUBLIC_READ',
 *             CrlDistributionPointExtensionConfiguration?: array,
 *             CrlType?: 'COMPLETE'|'PARTITIONED',
 *             CustomPath?: string,
 *             ...,
 *         },
 *         OcspConfiguration?: array{Enabled?: bool, OcspCustomCname?: string, ...},
 *         ...,
 *     },
 *     Status?: 'ACTIVE'|'CREATING'|'DELETED'|'DISABLED'|'EXPIRED'|'FAILED'|'PENDING_CERTIFICATE',
 *     ...,
 * } $args = [])
 */
class ACMPCAClient extends AwsClient {}
