<?php
namespace Aws\ManagedGrafana;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Grafana** service.
 * @method \Aws\Result associateLicense(array $args = [])
 * @phpstan-method \Aws\Result associateLicense(array{workspaceId?: string, licenseType?: 'ENTERPRISE'|'ENTERPRISE_FREE_TRIAL', grafanaToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLicenseAsync(array{workspaceId?: string, licenseType?: 'ENTERPRISE'|'ENTERPRISE_FREE_TRIAL', grafanaToken?: string, ...} $args = [])
 * @method \Aws\Result createWorkspace(array $args = [])
 * @phpstan-method \Aws\Result createWorkspace(array{
 *     accountAccessType?: 'CURRENT_ACCOUNT'|'ORGANIZATION',
 *     clientToken?: string,
 *     organizationRoleName?: string,
 *     permissionType?: 'CUSTOMER_MANAGED'|'SERVICE_MANAGED',
 *     stackSetName?: string,
 *     workspaceDataSources?: list<'AMAZON_OPENSEARCH_SERVICE'|'ATHENA'|'CLOUDWATCH'|'PROMETHEUS'|'REDSHIFT'|'SITEWISE'|'TIMESTREAM'|'TWINMAKER'|'XRAY'>,
 *     workspaceDescription?: string,
 *     workspaceName?: string,
 *     workspaceNotificationDestinations?: list<'SNS'>,
 *     workspaceOrganizationalUnits?: list<string>,
 *     workspaceRoleArn?: string,
 *     authenticationProviders?: list<'AWS_SSO'|'SAML'>,
 *     tags?: array<string, string>,
 *     vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *     configuration?: string,
 *     networkAccessControl?: array{prefixListIds?: list<string>, vpceIds?: list<string>, ...},
 *     grafanaVersion?: string,
 *     ipAddressType?: 'DualStack'|'IPv4',
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array{
 *     accountAccessType?: 'CURRENT_ACCOUNT'|'ORGANIZATION',
 *     clientToken?: string,
 *     organizationRoleName?: string,
 *     permissionType?: 'CUSTOMER_MANAGED'|'SERVICE_MANAGED',
 *     stackSetName?: string,
 *     workspaceDataSources?: list<'AMAZON_OPENSEARCH_SERVICE'|'ATHENA'|'CLOUDWATCH'|'PROMETHEUS'|'REDSHIFT'|'SITEWISE'|'TIMESTREAM'|'TWINMAKER'|'XRAY'>,
 *     workspaceDescription?: string,
 *     workspaceName?: string,
 *     workspaceNotificationDestinations?: list<'SNS'>,
 *     workspaceOrganizationalUnits?: list<string>,
 *     workspaceRoleArn?: string,
 *     authenticationProviders?: list<'AWS_SSO'|'SAML'>,
 *     tags?: array<string, string>,
 *     vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *     configuration?: string,
 *     networkAccessControl?: array{prefixListIds?: list<string>, vpceIds?: list<string>, ...},
 *     grafanaVersion?: string,
 *     ipAddressType?: 'DualStack'|'IPv4',
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspaceApiKey(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceApiKey(array{keyName?: string, keyRole?: string, secondsToLive?: int, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceApiKeyAsync(array{keyName?: string, keyRole?: string, secondsToLive?: int, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result createWorkspaceServiceAccount(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceServiceAccount(array{name?: string, grafanaRole?: 'ADMIN'|'EDITOR'|'VIEWER', workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceServiceAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceServiceAccountAsync(array{name?: string, grafanaRole?: 'ADMIN'|'EDITOR'|'VIEWER', workspaceId?: string, ...} $args = [])
 * @method \Aws\Result createWorkspaceServiceAccountToken(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceServiceAccountToken(array{name?: string, secondsToLive?: int, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceServiceAccountTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceServiceAccountTokenAsync(array{name?: string, secondsToLive?: int, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspace(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspace(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceApiKey(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceApiKey(array{keyName?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceApiKeyAsync(array{keyName?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceServiceAccount(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceServiceAccount(array{serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountAsync(array{serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceServiceAccountToken(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceServiceAccountToken(array{tokenId?: string, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountTokenAsync(array{tokenId?: string, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspace(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspace(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaceAuthentication(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceAuthentication(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAuthenticationAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceConfiguration(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceConfigurationAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateLicense(array $args = [])
 * @phpstan-method \Aws\Result disassociateLicense(array{workspaceId?: string, licenseType?: 'ENTERPRISE'|'ENTERPRISE_FREE_TRIAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLicenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLicenseAsync(array{workspaceId?: string, licenseType?: 'ENTERPRISE'|'ENTERPRISE_FREE_TRIAL', ...} $args = [])
 * @method \Aws\Result listPermissions(array $args = [])
 * @phpstan-method \Aws\Result listPermissions(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     userType?: 'SSO_GROUP'|'SSO_USER',
 *     userId?: string,
 *     groupId?: string,
 *     workspaceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     userType?: 'SSO_GROUP'|'SSO_USER',
 *     userId?: string,
 *     groupId?: string,
 *     workspaceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVersions(array $args = [])
 * @phpstan-method \Aws\Result listVersions(array{maxResults?: int, nextToken?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVersionsAsync(array{maxResults?: int, nextToken?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaceServiceAccountTokens(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaceServiceAccountTokens(array{maxResults?: int, nextToken?: string, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspaceServiceAccountTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspaceServiceAccountTokensAsync(array{maxResults?: int, nextToken?: string, serviceAccountId?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaceServiceAccounts(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaceServiceAccounts(array{maxResults?: int, nextToken?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspaceServiceAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspaceServiceAccountsAsync(array{maxResults?: int, nextToken?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaces(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updatePermissions(array $args = [])
 * @phpstan-method \Aws\Result updatePermissions(array{
 *     updateInstructionBatch?: list<array{action?: 'ADD'|'REVOKE', role?: 'ADMIN'|'EDITOR'|'VIEWER', users?: list<array>, ...}>,
 *     workspaceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePermissionsAsync(array{
 *     updateInstructionBatch?: list<array{action?: 'ADD'|'REVOKE', role?: 'ADMIN'|'EDITOR'|'VIEWER', users?: list<array>, ...}>,
 *     workspaceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspace(array{
 *     accountAccessType?: 'CURRENT_ACCOUNT'|'ORGANIZATION',
 *     organizationRoleName?: string,
 *     permissionType?: 'CUSTOMER_MANAGED'|'SERVICE_MANAGED',
 *     stackSetName?: string,
 *     workspaceDataSources?: list<'AMAZON_OPENSEARCH_SERVICE'|'ATHENA'|'CLOUDWATCH'|'PROMETHEUS'|'REDSHIFT'|'SITEWISE'|'TIMESTREAM'|'TWINMAKER'|'XRAY'>,
 *     workspaceDescription?: string,
 *     workspaceId?: string,
 *     workspaceName?: string,
 *     workspaceNotificationDestinations?: list<'SNS'>,
 *     workspaceOrganizationalUnits?: list<string>,
 *     workspaceRoleArn?: string,
 *     vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *     removeVpcConfiguration?: bool,
 *     networkAccessControl?: array{prefixListIds?: list<string>, vpceIds?: list<string>, ...},
 *     removeNetworkAccessConfiguration?: bool,
 *     ipAddressType?: 'DualStack'|'IPv4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array{
 *     accountAccessType?: 'CURRENT_ACCOUNT'|'ORGANIZATION',
 *     organizationRoleName?: string,
 *     permissionType?: 'CUSTOMER_MANAGED'|'SERVICE_MANAGED',
 *     stackSetName?: string,
 *     workspaceDataSources?: list<'AMAZON_OPENSEARCH_SERVICE'|'ATHENA'|'CLOUDWATCH'|'PROMETHEUS'|'REDSHIFT'|'SITEWISE'|'TIMESTREAM'|'TWINMAKER'|'XRAY'>,
 *     workspaceDescription?: string,
 *     workspaceId?: string,
 *     workspaceName?: string,
 *     workspaceNotificationDestinations?: list<'SNS'>,
 *     workspaceOrganizationalUnits?: list<string>,
 *     workspaceRoleArn?: string,
 *     vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *     removeVpcConfiguration?: bool,
 *     networkAccessControl?: array{prefixListIds?: list<string>, vpceIds?: list<string>, ...},
 *     removeNetworkAccessConfiguration?: bool,
 *     ipAddressType?: 'DualStack'|'IPv4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspaceAuthentication(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceAuthentication(array{
 *     workspaceId?: string,
 *     authenticationProviders?: list<'AWS_SSO'|'SAML'>,
 *     samlConfiguration?: array{
 *         idpMetadata?: array{url?: string, xml?: string, ...},
 *         assertionAttributes?: array{name?: string, login?: string, email?: string, groups?: string, role?: string, org?: string, ...},
 *         roleValues?: array{editor?: list<string>, admin?: list<string>, ...},
 *         allowedOrganizations?: list<string>,
 *         loginValidityDuration?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceAuthenticationAsync(array{
 *     workspaceId?: string,
 *     authenticationProviders?: list<'AWS_SSO'|'SAML'>,
 *     samlConfiguration?: array{
 *         idpMetadata?: array{url?: string, xml?: string, ...},
 *         assertionAttributes?: array{name?: string, login?: string, email?: string, groups?: string, role?: string, org?: string, ...},
 *         roleValues?: array{editor?: list<string>, admin?: list<string>, ...},
 *         allowedOrganizations?: list<string>,
 *         loginValidityDuration?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspaceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceConfiguration(array{configuration?: string, workspaceId?: string, grafanaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceConfigurationAsync(array{configuration?: string, workspaceId?: string, grafanaVersion?: string, ...} $args = [])
 */
class ManagedGrafanaClient extends AwsClient {}
