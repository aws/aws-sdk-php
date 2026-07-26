<?php
namespace Aws\Organizations;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Organizations** service.
 * @method \Aws\Result acceptHandshake(array $args = [])
 * @phpstan-method \Aws\Result acceptHandshake(array{HandshakeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptHandshakeAsync(array{HandshakeId?: string, ...} $args = [])
 * @method \Aws\Result attachPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachPolicy(array{PolicyId?: string, TargetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachPolicyAsync(array{PolicyId?: string, TargetId?: string, ...} $args = [])
 * @method \Aws\Result cancelHandshake(array $args = [])
 * @phpstan-method \Aws\Result cancelHandshake(array{HandshakeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelHandshakeAsync(array{HandshakeId?: string, ...} $args = [])
 * @method \Aws\Result closeAccount(array $args = [])
 * @phpstan-method \Aws\Result closeAccount(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise closeAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise closeAccountAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result createAccount(array $args = [])
 * @phpstan-method \Aws\Result createAccount(array{
 *     Email?: string,
 *     AccountName?: string,
 *     RoleName?: string,
 *     IamUserAccessToBilling?: 'ALLOW'|'DENY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountAsync(array{
 *     Email?: string,
 *     AccountName?: string,
 *     RoleName?: string,
 *     IamUserAccessToBilling?: 'ALLOW'|'DENY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGovCloudAccount(array $args = [])
 * @phpstan-method \Aws\Result createGovCloudAccount(array{
 *     Email?: string,
 *     AccountName?: string,
 *     RoleName?: string,
 *     IamUserAccessToBilling?: 'ALLOW'|'DENY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGovCloudAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGovCloudAccountAsync(array{
 *     Email?: string,
 *     AccountName?: string,
 *     RoleName?: string,
 *     IamUserAccessToBilling?: 'ALLOW'|'DENY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOrganization(array $args = [])
 * @phpstan-method \Aws\Result createOrganization(array{FeatureSet?: 'ALL'|'CONSOLIDATED_BILLING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOrganizationAsync(array{FeatureSet?: 'ALL'|'CONSOLIDATED_BILLING', ...} $args = [])
 * @method \Aws\Result createOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result createOrganizationalUnit(array{ParentId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOrganizationalUnitAsync(array{ParentId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     Content?: string,
 *     Description?: string,
 *     Name?: string,
 *     Type?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     Content?: string,
 *     Description?: string,
 *     Name?: string,
 *     Type?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result declineHandshake(array $args = [])
 * @phpstan-method \Aws\Result declineHandshake(array{HandshakeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise declineHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise declineHandshakeAsync(array{HandshakeId?: string, ...} $args = [])
 * @method \Aws\Result deleteOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result deleteOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result deleteOrganizationalUnit(array{OrganizationalUnitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOrganizationalUnitAsync(array{OrganizationalUnitId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{PolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{PolicyId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{...} $args = [])
 * @method \Aws\Result deregisterDelegatedAdministrator(array $args = [])
 * @phpstan-method \Aws\Result deregisterDelegatedAdministrator(array{AccountId?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterDelegatedAdministratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterDelegatedAdministratorAsync(array{AccountId?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result describeAccount(array $args = [])
 * @phpstan-method \Aws\Result describeAccount(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeCreateAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result describeCreateAccountStatus(array{CreateAccountRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCreateAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCreateAccountStatusAsync(array{CreateAccountRequestId?: string, ...} $args = [])
 * @method \Aws\Result describeEffectivePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeEffectivePolicy(array{
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     TargetId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEffectivePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEffectivePolicyAsync(array{
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     TargetId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeHandshake(array $args = [])
 * @phpstan-method \Aws\Result describeHandshake(array{HandshakeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHandshakeAsync(array{HandshakeId?: string, ...} $args = [])
 * @method \Aws\Result describeOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result describeOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationalUnit(array{OrganizationalUnitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationalUnitAsync(array{OrganizationalUnitId?: string, ...} $args = [])
 * @method \Aws\Result describePolicy(array $args = [])
 * @phpstan-method \Aws\Result describePolicy(array{PolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePolicyAsync(array{PolicyId?: string, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{...} $args = [])
 * @method \Aws\Result describeResponsibilityTransfer(array $args = [])
 * @phpstan-method \Aws\Result describeResponsibilityTransfer(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResponsibilityTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResponsibilityTransferAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result detachPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachPolicy(array{PolicyId?: string, TargetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachPolicyAsync(array{PolicyId?: string, TargetId?: string, ...} $args = [])
 * @method \Aws\Result disableAWSServiceAccess(array $args = [])
 * @phpstan-method \Aws\Result disableAWSServiceAccess(array{ServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAWSServiceAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAWSServiceAccessAsync(array{ServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result disablePolicyType(array $args = [])
 * @phpstan-method \Aws\Result disablePolicyType(array{
 *     RootId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disablePolicyTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disablePolicyTypeAsync(array{
 *     RootId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableAWSServiceAccess(array $args = [])
 * @phpstan-method \Aws\Result enableAWSServiceAccess(array{ServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAWSServiceAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAWSServiceAccessAsync(array{ServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result enableAllFeatures(array $args = [])
 * @phpstan-method \Aws\Result enableAllFeatures(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAllFeaturesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAllFeaturesAsync(array{...} $args = [])
 * @method \Aws\Result enablePolicyType(array $args = [])
 * @phpstan-method \Aws\Result enablePolicyType(array{
 *     RootId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enablePolicyTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enablePolicyTypeAsync(array{
 *     RootId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result inviteAccountToOrganization(array $args = [])
 * @phpstan-method \Aws\Result inviteAccountToOrganization(array{
 *     Target?: array{Id?: string, Type?: 'ACCOUNT'|'EMAIL'|'ORGANIZATION', ...},
 *     Notes?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteAccountToOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inviteAccountToOrganizationAsync(array{
 *     Target?: array{Id?: string, Type?: 'ACCOUNT'|'EMAIL'|'ORGANIZATION', ...},
 *     Notes?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result inviteOrganizationToTransferResponsibility(array $args = [])
 * @phpstan-method \Aws\Result inviteOrganizationToTransferResponsibility(array{
 *     Type?: 'BILLING',
 *     Target?: array{Id?: string, Type?: 'ACCOUNT'|'EMAIL'|'ORGANIZATION', ...},
 *     Notes?: string,
 *     StartTimestamp?: int|string|\DateTimeInterface,
 *     SourceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteOrganizationToTransferResponsibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inviteOrganizationToTransferResponsibilityAsync(array{
 *     Type?: 'BILLING',
 *     Target?: array{Id?: string, Type?: 'ACCOUNT'|'EMAIL'|'ORGANIZATION', ...},
 *     Notes?: string,
 *     StartTimestamp?: int|string|\DateTimeInterface,
 *     SourceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result leaveOrganization(array $args = [])
 * @phpstan-method \Aws\Result leaveOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise leaveOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise leaveOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result listAWSServiceAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listAWSServiceAccessForOrganization(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAWSServiceAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAWSServiceAccessForOrganizationAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAccounts(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccountsForParent(array $args = [])
 * @phpstan-method \Aws\Result listAccountsForParent(array{ParentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsForParentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsForParentAsync(array{ParentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccountsWithInvalidEffectivePolicy(array $args = [])
 * @phpstan-method \Aws\Result listAccountsWithInvalidEffectivePolicy(array{
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsWithInvalidEffectivePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsWithInvalidEffectivePolicyAsync(array{
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChildren(array $args = [])
 * @phpstan-method \Aws\Result listChildren(array{
 *     ParentId?: string,
 *     ChildType?: 'ACCOUNT'|'ORGANIZATIONAL_UNIT',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChildrenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChildrenAsync(array{
 *     ParentId?: string,
 *     ChildType?: 'ACCOUNT'|'ORGANIZATIONAL_UNIT',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCreateAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result listCreateAccountStatus(array{States?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCreateAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCreateAccountStatusAsync(array{States?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDelegatedAdministrators(array $args = [])
 * @phpstan-method \Aws\Result listDelegatedAdministrators(array{ServicePrincipal?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDelegatedAdministratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDelegatedAdministratorsAsync(array{ServicePrincipal?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDelegatedServicesForAccount(array $args = [])
 * @phpstan-method \Aws\Result listDelegatedServicesForAccount(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDelegatedServicesForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDelegatedServicesForAccountAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEffectivePolicyValidationErrors(array $args = [])
 * @phpstan-method \Aws\Result listEffectivePolicyValidationErrors(array{
 *     AccountId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEffectivePolicyValidationErrorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEffectivePolicyValidationErrorsAsync(array{
 *     AccountId?: string,
 *     PolicyType?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHandshakesForAccount(array $args = [])
 * @phpstan-method \Aws\Result listHandshakesForAccount(array{
 *     Filter?: array{
 *         ActionType?: 'ADD_ORGANIZATIONS_SERVICE_LINKED_ROLE'|'APPROVE_ALL_FEATURES'|'ENABLE_ALL_FEATURES'|'INVITE'|'TRANSFER_RESPONSIBILITY',
 *         ParentHandshakeId?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHandshakesForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHandshakesForAccountAsync(array{
 *     Filter?: array{
 *         ActionType?: 'ADD_ORGANIZATIONS_SERVICE_LINKED_ROLE'|'APPROVE_ALL_FEATURES'|'ENABLE_ALL_FEATURES'|'INVITE'|'TRANSFER_RESPONSIBILITY',
 *         ParentHandshakeId?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHandshakesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listHandshakesForOrganization(array{
 *     Filter?: array{
 *         ActionType?: 'ADD_ORGANIZATIONS_SERVICE_LINKED_ROLE'|'APPROVE_ALL_FEATURES'|'ENABLE_ALL_FEATURES'|'INVITE'|'TRANSFER_RESPONSIBILITY',
 *         ParentHandshakeId?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHandshakesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHandshakesForOrganizationAsync(array{
 *     Filter?: array{
 *         ActionType?: 'ADD_ORGANIZATIONS_SERVICE_LINKED_ROLE'|'APPROVE_ALL_FEATURES'|'ENABLE_ALL_FEATURES'|'INVITE'|'TRANSFER_RESPONSIBILITY',
 *         ParentHandshakeId?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInboundResponsibilityTransfers(array $args = [])
 * @phpstan-method \Aws\Result listInboundResponsibilityTransfers(array{Type?: 'BILLING', Id?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInboundResponsibilityTransfersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInboundResponsibilityTransfersAsync(array{Type?: 'BILLING', Id?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOrganizationalUnitsForParent(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationalUnitsForParent(array{ParentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationalUnitsForParentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationalUnitsForParentAsync(array{ParentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOutboundResponsibilityTransfers(array $args = [])
 * @phpstan-method \Aws\Result listOutboundResponsibilityTransfers(array{Type?: 'BILLING', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutboundResponsibilityTransfersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutboundResponsibilityTransfersAsync(array{Type?: 'BILLING', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listParents(array $args = [])
 * @phpstan-method \Aws\Result listParents(array{ChildId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listParentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listParentsAsync(array{ChildId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{
 *     Filter?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{
 *     Filter?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPoliciesForTarget(array $args = [])
 * @phpstan-method \Aws\Result listPoliciesForTarget(array{
 *     TargetId?: string,
 *     Filter?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesForTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesForTargetAsync(array{
 *     TargetId?: string,
 *     Filter?: 'AISERVICES_OPT_OUT_POLICY'|'BACKUP_POLICY'|'BEDROCK_POLICY'|'CHATBOT_POLICY'|'DECLARATIVE_POLICY_EC2'|'INSPECTOR_POLICY'|'NETWORK_SECURITY_DIRECTOR_POLICY'|'RESOURCE_CONTROL_POLICY'|'S3_POLICY'|'SECURITYHUB_POLICY'|'SERVICE_CONTROL_POLICY'|'TAG_POLICY'|'UPGRADE_ROLLOUT_POLICY',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRoots(array $args = [])
 * @phpstan-method \Aws\Result listRoots(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRootsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRootsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTargetsForPolicy(array $args = [])
 * @phpstan-method \Aws\Result listTargetsForPolicy(array{PolicyId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsForPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsForPolicyAsync(array{PolicyId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result moveAccount(array $args = [])
 * @phpstan-method \Aws\Result moveAccount(array{AccountId?: string, SourceParentId?: string, DestinationParentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise moveAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise moveAccountAsync(array{AccountId?: string, SourceParentId?: string, DestinationParentId?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{Content?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{Content?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result registerDelegatedAdministrator(array $args = [])
 * @phpstan-method \Aws\Result registerDelegatedAdministrator(array{AccountId?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDelegatedAdministratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDelegatedAdministratorAsync(array{AccountId?: string, ServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result removeAccountFromOrganization(array $args = [])
 * @phpstan-method \Aws\Result removeAccountFromOrganization(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAccountFromOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAccountFromOrganizationAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result terminateResponsibilityTransfer(array $args = [])
 * @phpstan-method \Aws\Result terminateResponsibilityTransfer(array{Id?: string, EndTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateResponsibilityTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateResponsibilityTransferAsync(array{Id?: string, EndTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationalUnit(array{OrganizationalUnitId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationalUnitAsync(array{OrganizationalUnitId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updatePolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePolicy(array{PolicyId?: string, Name?: string, Description?: string, Content?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyAsync(array{PolicyId?: string, Name?: string, Description?: string, Content?: string, ...} $args = [])
 * @method \Aws\Result updateResponsibilityTransfer(array $args = [])
 * @phpstan-method \Aws\Result updateResponsibilityTransfer(array{Id?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResponsibilityTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResponsibilityTransferAsync(array{Id?: string, Name?: string, ...} $args = [])
 */
class OrganizationsClient extends AwsClient {}
