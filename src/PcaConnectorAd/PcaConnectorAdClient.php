<?php
namespace Aws\PcaConnectorAd;

use Aws\AwsClient;

/**
 * This client is used to interact with the **PcaConnectorAd** service.
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     CertificateAuthorityArn?: string,
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     Tags?: array<string, string>,
 *     VpcInformation?: array{IpAddressType?: 'DUALSTACK'|'IPV4', SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     CertificateAuthorityArn?: string,
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     Tags?: array<string, string>,
 *     VpcInformation?: array{IpAddressType?: 'DUALSTACK'|'IPV4', SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectoryRegistration(array $args = [])
 * @phpstan-method \Aws\Result createDirectoryRegistration(array{ClientToken?: string, DirectoryId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectoryRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectoryRegistrationAsync(array{ClientToken?: string, DirectoryId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createServicePrincipalName(array $args = [])
 * @phpstan-method \Aws\Result createServicePrincipalName(array{ClientToken?: string, ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createServicePrincipalNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServicePrincipalNameAsync(array{ClientToken?: string, ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     ClientToken?: string,
 *     ConnectorArn?: string,
 *     Definition?: array{
 *         TemplateV2?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV3?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV4?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     ClientToken?: string,
 *     ConnectorArn?: string,
 *     Definition?: array{
 *         TemplateV2?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV3?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV4?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplateGroupAccessControlEntry(array $args = [])
 * @phpstan-method \Aws\Result createTemplateGroupAccessControlEntry(array{
 *     AccessRights?: array{AutoEnroll?: 'ALLOW'|'DENY', Enroll?: 'ALLOW'|'DENY', ...},
 *     ClientToken?: string,
 *     GroupDisplayName?: string,
 *     GroupSecurityIdentifier?: string,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateGroupAccessControlEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateGroupAccessControlEntryAsync(array{
 *     AccessRights?: array{AutoEnroll?: 'ALLOW'|'DENY', Enroll?: 'ALLOW'|'DENY', ...},
 *     ClientToken?: string,
 *     GroupDisplayName?: string,
 *     GroupSecurityIdentifier?: string,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{ConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{ConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectoryRegistration(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectoryRegistration(array{DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectoryRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectoryRegistrationAsync(array{DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteServicePrincipalName(array $args = [])
 * @phpstan-method \Aws\Result deleteServicePrincipalName(array{ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServicePrincipalNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServicePrincipalNameAsync(array{ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplateGroupAccessControlEntry(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplateGroupAccessControlEntry(array{GroupSecurityIdentifier?: string, TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateGroupAccessControlEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateGroupAccessControlEntryAsync(array{GroupSecurityIdentifier?: string, TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result getConnector(array $args = [])
 * @phpstan-method \Aws\Result getConnector(array{ConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorAsync(array{ConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result getDirectoryRegistration(array $args = [])
 * @phpstan-method \Aws\Result getDirectoryRegistration(array{DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectoryRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDirectoryRegistrationAsync(array{DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \Aws\Result getServicePrincipalName(array $args = [])
 * @phpstan-method \Aws\Result getServicePrincipalName(array{ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServicePrincipalNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServicePrincipalNameAsync(array{ConnectorArn?: string, DirectoryRegistrationArn?: string, ...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result getTemplateGroupAccessControlEntry(array $args = [])
 * @phpstan-method \Aws\Result getTemplateGroupAccessControlEntry(array{GroupSecurityIdentifier?: string, TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateGroupAccessControlEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateGroupAccessControlEntryAsync(array{GroupSecurityIdentifier?: string, TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDirectoryRegistrations(array $args = [])
 * @phpstan-method \Aws\Result listDirectoryRegistrations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDirectoryRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDirectoryRegistrationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listServicePrincipalNames(array $args = [])
 * @phpstan-method \Aws\Result listServicePrincipalNames(array{DirectoryRegistrationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicePrincipalNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicePrincipalNamesAsync(array{DirectoryRegistrationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateGroupAccessControlEntries(array $args = [])
 * @phpstan-method \Aws\Result listTemplateGroupAccessControlEntries(array{MaxResults?: int, NextToken?: string, TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateGroupAccessControlEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateGroupAccessControlEntriesAsync(array{MaxResults?: int, NextToken?: string, TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{ConnectorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{ConnectorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{
 *     Definition?: array{
 *         TemplateV2?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV3?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV4?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ReenrollAllCertificateHolders?: bool,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{
 *     Definition?: array{
 *         TemplateV2?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV3?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         TemplateV4?: array{
 *             CertificateValidity?: array,
 *             EnrollmentFlags?: array,
 *             Extensions?: array,
 *             GeneralFlags?: array,
 *             HashAlgorithm?: 'SHA256'|'SHA384'|'SHA512',
 *             PrivateKeyAttributes?: array,
 *             PrivateKeyFlags?: array,
 *             SubjectNameFlags?: array,
 *             SupersededTemplates?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ReenrollAllCertificateHolders?: bool,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplateGroupAccessControlEntry(array $args = [])
 * @phpstan-method \Aws\Result updateTemplateGroupAccessControlEntry(array{
 *     AccessRights?: array{AutoEnroll?: 'ALLOW'|'DENY', Enroll?: 'ALLOW'|'DENY', ...},
 *     GroupDisplayName?: string,
 *     GroupSecurityIdentifier?: string,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateGroupAccessControlEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateGroupAccessControlEntryAsync(array{
 *     AccessRights?: array{AutoEnroll?: 'ALLOW'|'DENY', Enroll?: 'ALLOW'|'DENY', ...},
 *     GroupDisplayName?: string,
 *     GroupSecurityIdentifier?: string,
 *     TemplateArn?: string,
 *     ...,
 * } $args = [])
 */
class PcaConnectorAdClient extends AwsClient {}
