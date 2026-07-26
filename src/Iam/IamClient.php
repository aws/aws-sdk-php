<?php
namespace Aws\Iam;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Identity and Access Management (AWS IAM)** service.
 *
 * @method \Aws\Result acceptDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptDelegationRequest(array{DelegationRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptDelegationRequestAsync(array{DelegationRequestId?: string, ...} $args = [])
 * @method \Aws\Result addClientIDToOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result addClientIDToOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, ClientID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addClientIDToOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addClientIDToOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, ClientID?: string, ...} $args = [])
 * @method \Aws\Result addRoleToInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result addRoleToInstanceProfile(array{InstanceProfileName?: string, RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addRoleToInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addRoleToInstanceProfileAsync(array{InstanceProfileName?: string, RoleName?: string, ...} $args = [])
 * @method \Aws\Result addUserToGroup(array $args = [])
 * @phpstan-method \Aws\Result addUserToGroup(array{GroupName?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addUserToGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addUserToGroupAsync(array{GroupName?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result associateDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result associateDelegationRequest(array{DelegationRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDelegationRequestAsync(array{DelegationRequestId?: string, ...} $args = [])
 * @method \Aws\Result attachGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachGroupPolicy(array{GroupName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachGroupPolicyAsync(array{GroupName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result attachRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result attachRolePolicy(array{RoleName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachRolePolicyAsync(array{RoleName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result attachUserPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachUserPolicy(array{UserName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachUserPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachUserPolicyAsync(array{UserName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result changePassword(array $args = [])
 * @phpstan-method \Aws\Result changePassword(array{OldPassword?: string, NewPassword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise changePasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changePasswordAsync(array{OldPassword?: string, NewPassword?: string, ...} $args = [])
 * @method \Aws\Result createAccessKey(array $args = [])
 * @phpstan-method \Aws\Result createAccessKey(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessKeyAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result createAccountAlias(array $args = [])
 * @phpstan-method \Aws\Result createAccountAlias(array{AccountAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountAliasAsync(array{AccountAlias?: string, ...} $args = [])
 * @method \Aws\Result createDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result createDelegationRequest(array{
 *     OwnerAccountId?: string,
 *     Description?: string,
 *     Permissions?: array{PolicyTemplateArn?: string, Parameters?: list<array>, ...},
 *     RequestMessage?: string,
 *     RequestorWorkflowId?: string,
 *     RedirectUrl?: string,
 *     NotificationChannel?: string,
 *     SessionDuration?: int,
 *     OnlySendByOwner?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDelegationRequestAsync(array{
 *     OwnerAccountId?: string,
 *     Description?: string,
 *     Permissions?: array{PolicyTemplateArn?: string, Parameters?: list<array>, ...},
 *     RequestMessage?: string,
 *     RequestorWorkflowId?: string,
 *     RedirectUrl?: string,
 *     NotificationChannel?: string,
 *     SessionDuration?: int,
 *     OnlySendByOwner?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{Path?: string, GroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{Path?: string, GroupName?: string, ...} $args = [])
 * @method \Aws\Result createInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result createInstanceProfile(array{InstanceProfileName?: string, Path?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array{InstanceProfileName?: string, Path?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createLoginProfile(array $args = [])
 * @phpstan-method \Aws\Result createLoginProfile(array{UserName?: string, Password?: string, PasswordResetRequired?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoginProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoginProfileAsync(array{UserName?: string, Password?: string, PasswordResetRequired?: bool, ...} $args = [])
 * @method \Aws\Result createOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result createOpenIDConnectProvider(array{
 *     Url?: string,
 *     ClientIDList?: list<string>,
 *     ThumbprintList?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOpenIDConnectProviderAsync(array{
 *     Url?: string,
 *     ClientIDList?: list<string>,
 *     ThumbprintList?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     PolicyName?: string,
 *     Path?: string,
 *     PolicyDocument?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     PolicyName?: string,
 *     Path?: string,
 *     PolicyDocument?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result createPolicyVersion(array{PolicyArn?: string, PolicyDocument?: string, SetAsDefault?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyVersionAsync(array{PolicyArn?: string, PolicyDocument?: string, SetAsDefault?: bool, ...} $args = [])
 * @method \Aws\Result createRole(array $args = [])
 * @phpstan-method \Aws\Result createRole(array{
 *     Path?: string,
 *     RoleName?: string,
 *     AssumeRolePolicyDocument?: string,
 *     Description?: string,
 *     MaxSessionDuration?: int,
 *     PermissionsBoundary?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoleAsync(array{
 *     Path?: string,
 *     RoleName?: string,
 *     AssumeRolePolicyDocument?: string,
 *     Description?: string,
 *     MaxSessionDuration?: int,
 *     PermissionsBoundary?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result createSAMLProvider(array{
 *     SAMLMetadataDocument?: string,
 *     Name?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AssertionEncryptionMode?: 'Allowed'|'Required',
 *     AddPrivateKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSAMLProviderAsync(array{
 *     SAMLMetadataDocument?: string,
 *     Name?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AssertionEncryptionMode?: 'Allowed'|'Required',
 *     AddPrivateKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceLinkedRole(array $args = [])
 * @phpstan-method \Aws\Result createServiceLinkedRole(array{AWSServiceName?: string, Description?: string, CustomSuffix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceLinkedRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceLinkedRoleAsync(array{AWSServiceName?: string, Description?: string, CustomSuffix?: string, ...} $args = [])
 * @method \Aws\Result createServiceSpecificCredential(array $args = [])
 * @phpstan-method \Aws\Result createServiceSpecificCredential(array{UserName?: string, ServiceName?: string, CredentialAgeDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceSpecificCredentialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceSpecificCredentialAsync(array{UserName?: string, ServiceName?: string, CredentialAgeDays?: int, ...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     Path?: string,
 *     UserName?: string,
 *     PermissionsBoundary?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     Path?: string,
 *     UserName?: string,
 *     PermissionsBoundary?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualMFADevice(array $args = [])
 * @phpstan-method \Aws\Result createVirtualMFADevice(array{
 *     Path?: string,
 *     VirtualMFADeviceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualMFADeviceAsync(array{
 *     Path?: string,
 *     VirtualMFADeviceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateMFADevice(array $args = [])
 * @phpstan-method \Aws\Result deactivateMFADevice(array{UserName?: string, SerialNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateMFADeviceAsync(array{UserName?: string, SerialNumber?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessKey(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessKey(array{UserName?: string, AccessKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessKeyAsync(array{UserName?: string, AccessKeyId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccountAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountAlias(array{AccountAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array{AccountAlias?: string, ...} $args = [])
 * @method \Aws\Result deleteAccountPasswordPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountPasswordPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountPasswordPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountPasswordPolicyAsync(array{...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteGroupPolicy(array{GroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupPolicyAsync(array{GroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceProfile(array{InstanceProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array{InstanceProfileName?: string, ...} $args = [])
 * @method \Aws\Result deleteLoginProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteLoginProfile(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoginProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoginProfileAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result deleteOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result deletePolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyVersion(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result deleteRole(array $args = [])
 * @phpstan-method \Aws\Result deleteRole(array{RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoleAsync(array{RoleName?: string, ...} $args = [])
 * @method \Aws\Result deleteRolePermissionsBoundary(array $args = [])
 * @phpstan-method \Aws\Result deleteRolePermissionsBoundary(array{RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRolePermissionsBoundaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRolePermissionsBoundaryAsync(array{RoleName?: string, ...} $args = [])
 * @method \Aws\Result deleteRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRolePolicy(array{RoleName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRolePolicyAsync(array{RoleName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteSAMLProvider(array{SAMLProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSAMLProviderAsync(array{SAMLProviderArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result deleteSSHPublicKey(array{UserName?: string, SSHPublicKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSSHPublicKeyAsync(array{UserName?: string, SSHPublicKeyId?: string, ...} $args = [])
 * @method \Aws\Result deleteServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteServerCertificate(array{ServerCertificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServerCertificateAsync(array{ServerCertificateName?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceLinkedRole(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceLinkedRole(array{RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array{RoleName?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceSpecificCredential(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceSpecificCredential(array{UserName?: string, ServiceSpecificCredentialId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceSpecificCredentialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceSpecificCredentialAsync(array{UserName?: string, ServiceSpecificCredentialId?: string, ...} $args = [])
 * @method \Aws\Result deleteSigningCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteSigningCertificate(array{UserName?: string, CertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSigningCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSigningCertificateAsync(array{UserName?: string, CertificateId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPermissionsBoundary(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPermissionsBoundary(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPermissionsBoundaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPermissionsBoundaryAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPolicy(array{UserName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPolicyAsync(array{UserName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualMFADevice(array $args = [])
 * @phpstan-method \Aws\Result deleteVirtualMFADevice(array{SerialNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualMFADeviceAsync(array{SerialNumber?: string, ...} $args = [])
 * @method \Aws\Result detachGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachGroupPolicy(array{GroupName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachGroupPolicyAsync(array{GroupName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result detachRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result detachRolePolicy(array{RoleName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachRolePolicyAsync(array{RoleName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result detachUserPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachUserPolicy(array{UserName?: string, PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachUserPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachUserPolicyAsync(array{UserName?: string, PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result disableOrganizationsRootCredentialsManagement(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationsRootCredentialsManagement(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationsRootCredentialsManagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationsRootCredentialsManagementAsync(array{...} $args = [])
 * @method \Aws\Result disableOrganizationsRootSessions(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationsRootSessions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationsRootSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationsRootSessionsAsync(array{...} $args = [])
 * @method \Aws\Result disableOutboundWebIdentityFederation(array $args = [])
 * @phpstan-method \Aws\Result disableOutboundWebIdentityFederation(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOutboundWebIdentityFederationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOutboundWebIdentityFederationAsync(array{...} $args = [])
 * @method \Aws\Result enableMFADevice(array $args = [])
 * @phpstan-method \Aws\Result enableMFADevice(array{
 *     UserName?: string,
 *     SerialNumber?: string,
 *     AuthenticationCode1?: string,
 *     AuthenticationCode2?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableMFADeviceAsync(array{
 *     UserName?: string,
 *     SerialNumber?: string,
 *     AuthenticationCode1?: string,
 *     AuthenticationCode2?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableOrganizationsRootCredentialsManagement(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationsRootCredentialsManagement(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationsRootCredentialsManagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationsRootCredentialsManagementAsync(array{...} $args = [])
 * @method \Aws\Result enableOrganizationsRootSessions(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationsRootSessions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationsRootSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationsRootSessionsAsync(array{...} $args = [])
 * @method \Aws\Result enableOutboundWebIdentityFederation(array $args = [])
 * @phpstan-method \Aws\Result enableOutboundWebIdentityFederation(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOutboundWebIdentityFederationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOutboundWebIdentityFederationAsync(array{...} $args = [])
 * @method \Aws\Result generateCredentialReport(array $args = [])
 * @phpstan-method \Aws\Result generateCredentialReport(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateCredentialReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateCredentialReportAsync(array{...} $args = [])
 * @method \Aws\Result generateOrganizationsAccessReport(array $args = [])
 * @phpstan-method \Aws\Result generateOrganizationsAccessReport(array{EntityPath?: string, OrganizationsPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateOrganizationsAccessReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateOrganizationsAccessReportAsync(array{EntityPath?: string, OrganizationsPolicyId?: string, ...} $args = [])
 * @method \Aws\Result generateServiceLastAccessedDetails(array $args = [])
 * @phpstan-method \Aws\Result generateServiceLastAccessedDetails(array{Arn?: string, Granularity?: 'ACTION_LEVEL'|'SERVICE_LEVEL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateServiceLastAccessedDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateServiceLastAccessedDetailsAsync(array{Arn?: string, Granularity?: 'ACTION_LEVEL'|'SERVICE_LEVEL', ...} $args = [])
 * @method \Aws\Result getAccessKeyLastUsed(array $args = [])
 * @phpstan-method \Aws\Result getAccessKeyLastUsed(array{AccessKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessKeyLastUsedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessKeyLastUsedAsync(array{AccessKeyId?: string, ...} $args = [])
 * @method \Aws\Result getAccountAuthorizationDetails(array $args = [])
 * @phpstan-method \Aws\Result getAccountAuthorizationDetails(array{
 *     Filter?: list<'AWSManagedPolicy'|'Group'|'LocalManagedPolicy'|'Role'|'User'>,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAuthorizationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAuthorizationDetailsAsync(array{
 *     Filter?: list<'AWSManagedPolicy'|'Group'|'LocalManagedPolicy'|'Role'|'User'>,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAccountPasswordPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAccountPasswordPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountPasswordPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountPasswordPolicyAsync(array{...} $args = [])
 * @method \Aws\Result getAccountSummary(array $args = [])
 * @phpstan-method \Aws\Result getAccountSummary(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSummaryAsync(array{...} $args = [])
 * @method \Aws\Result getContextKeysForCustomPolicy(array $args = [])
 * @phpstan-method \Aws\Result getContextKeysForCustomPolicy(array{PolicyInputList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContextKeysForCustomPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContextKeysForCustomPolicyAsync(array{PolicyInputList?: list<string>, ...} $args = [])
 * @method \Aws\Result getContextKeysForPrincipalPolicy(array $args = [])
 * @phpstan-method \Aws\Result getContextKeysForPrincipalPolicy(array{PolicySourceArn?: string, PolicyInputList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContextKeysForPrincipalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContextKeysForPrincipalPolicyAsync(array{PolicySourceArn?: string, PolicyInputList?: list<string>, ...} $args = [])
 * @method \Aws\Result getCredentialReport(array $args = [])
 * @phpstan-method \Aws\Result getCredentialReport(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCredentialReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCredentialReportAsync(array{...} $args = [])
 * @method \Aws\Result getDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result getDelegationRequest(array{DelegationRequestId?: string, DelegationPermissionCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDelegationRequestAsync(array{DelegationRequestId?: string, DelegationPermissionCheck?: bool, ...} $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result getGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result getGroupPolicy(array{GroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupPolicyAsync(array{GroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result getHumanReadableSummary(array $args = [])
 * @phpstan-method \Aws\Result getHumanReadableSummary(array{EntityArn?: string, Locale?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHumanReadableSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHumanReadableSummaryAsync(array{EntityArn?: string, Locale?: string, ...} $args = [])
 * @method \Aws\Result getInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result getInstanceProfile(array{InstanceProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array{InstanceProfileName?: string, ...} $args = [])
 * @method \Aws\Result getLoginProfile(array $args = [])
 * @phpstan-method \Aws\Result getLoginProfile(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoginProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoginProfileAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result getMFADevice(array $args = [])
 * @phpstan-method \Aws\Result getMFADevice(array{SerialNumber?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMFADeviceAsync(array{SerialNumber?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result getOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result getOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, ...} $args = [])
 * @method \Aws\Result getOrganizationsAccessReport(array $args = [])
 * @phpstan-method \Aws\Result getOrganizationsAccessReport(array{
 *     JobId?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     SortKey?: 'LAST_AUTHENTICATED_TIME_ASCENDING'|'LAST_AUTHENTICATED_TIME_DESCENDING'|'SERVICE_NAMESPACE_ASCENDING'|'SERVICE_NAMESPACE_DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationsAccessReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrganizationsAccessReportAsync(array{
 *     JobId?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     SortKey?: 'LAST_AUTHENTICATED_TIME_ASCENDING'|'LAST_AUTHENTICATED_TIME_DESCENDING'|'SERVICE_NAMESPACE_ASCENDING'|'SERVICE_NAMESPACE_DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getOutboundWebIdentityFederationInfo(array $args = [])
 * @phpstan-method \Aws\Result getOutboundWebIdentityFederationInfo(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutboundWebIdentityFederationInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutboundWebIdentityFederationInfoAsync(array{...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{PolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{PolicyArn?: string, ...} $args = [])
 * @method \Aws\Result getPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result getPolicyVersion(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result getRole(array $args = [])
 * @phpstan-method \Aws\Result getRole(array{RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoleAsync(array{RoleName?: string, ...} $args = [])
 * @method \Aws\Result getRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result getRolePolicy(array{RoleName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRolePolicyAsync(array{RoleName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result getSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result getSAMLProvider(array{SAMLProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSAMLProviderAsync(array{SAMLProviderArn?: string, ...} $args = [])
 * @method \Aws\Result getSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result getSSHPublicKey(array{UserName?: string, SSHPublicKeyId?: string, Encoding?: 'PEM'|'SSH', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSSHPublicKeyAsync(array{UserName?: string, SSHPublicKeyId?: string, Encoding?: 'PEM'|'SSH', ...} $args = [])
 * @method \Aws\Result getServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result getServerCertificate(array{ServerCertificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServerCertificateAsync(array{ServerCertificateName?: string, ...} $args = [])
 * @method \Aws\Result getServiceLastAccessedDetails(array $args = [])
 * @phpstan-method \Aws\Result getServiceLastAccessedDetails(array{JobId?: string, MaxItems?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsAsync(array{JobId?: string, MaxItems?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result getServiceLastAccessedDetailsWithEntities(array $args = [])
 * @phpstan-method \Aws\Result getServiceLastAccessedDetailsWithEntities(array{JobId?: string, ServiceNamespace?: string, MaxItems?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsWithEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsWithEntitiesAsync(array{JobId?: string, ServiceNamespace?: string, MaxItems?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result getServiceLinkedRoleDeletionStatus(array $args = [])
 * @phpstan-method \Aws\Result getServiceLinkedRoleDeletionStatus(array{DeletionTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLinkedRoleDeletionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceLinkedRoleDeletionStatusAsync(array{DeletionTaskId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result getUserPolicy(array $args = [])
 * @phpstan-method \Aws\Result getUserPolicy(array{UserName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserPolicyAsync(array{UserName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result listAccessKeys(array $args = [])
 * @phpstan-method \Aws\Result listAccessKeys(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessKeysAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listAccountAliases(array $args = [])
 * @phpstan-method \Aws\Result listAccountAliases(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAliasesAsync(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listAttachedGroupPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAttachedGroupPolicies(array{GroupName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedGroupPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedGroupPoliciesAsync(array{GroupName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listAttachedRolePolicies(array $args = [])
 * @phpstan-method \Aws\Result listAttachedRolePolicies(array{RoleName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedRolePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedRolePoliciesAsync(array{RoleName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listAttachedUserPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAttachedUserPolicies(array{UserName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedUserPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedUserPoliciesAsync(array{UserName?: string, PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listDelegationRequests(array $args = [])
 * @phpstan-method \Aws\Result listDelegationRequests(array{OwnerId?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDelegationRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDelegationRequestsAsync(array{OwnerId?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listEntitiesForPolicy(array $args = [])
 * @phpstan-method \Aws\Result listEntitiesForPolicy(array{
 *     PolicyArn?: string,
 *     EntityFilter?: 'AWSManagedPolicy'|'Group'|'LocalManagedPolicy'|'Role'|'User',
 *     PathPrefix?: string,
 *     PolicyUsageFilter?: 'PermissionsBoundary'|'PermissionsPolicy',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesForPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesForPolicyAsync(array{
 *     PolicyArn?: string,
 *     EntityFilter?: 'AWSManagedPolicy'|'Group'|'LocalManagedPolicy'|'Role'|'User',
 *     PathPrefix?: string,
 *     PolicyUsageFilter?: 'PermissionsBoundary'|'PermissionsPolicy',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroupPolicies(array $args = [])
 * @phpstan-method \Aws\Result listGroupPolicies(array{GroupName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupPoliciesAsync(array{GroupName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listGroupsForUser(array $args = [])
 * @phpstan-method \Aws\Result listGroupsForUser(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsForUserAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listInstanceProfileTags(array $args = [])
 * @phpstan-method \Aws\Result listInstanceProfileTags(array{InstanceProfileName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfileTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceProfileTagsAsync(array{InstanceProfileName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listInstanceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listInstanceProfiles(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listInstanceProfilesForRole(array $args = [])
 * @phpstan-method \Aws\Result listInstanceProfilesForRole(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesForRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceProfilesForRoleAsync(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listMFADeviceTags(array $args = [])
 * @phpstan-method \Aws\Result listMFADeviceTags(array{SerialNumber?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMFADeviceTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMFADeviceTagsAsync(array{SerialNumber?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listMFADevices(array $args = [])
 * @phpstan-method \Aws\Result listMFADevices(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMFADevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMFADevicesAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listOpenIDConnectProviderTags(array $args = [])
 * @phpstan-method \Aws\Result listOpenIDConnectProviderTags(array{OpenIDConnectProviderArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpenIDConnectProviderTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpenIDConnectProviderTagsAsync(array{OpenIDConnectProviderArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listOpenIDConnectProviders(array $args = [])
 * @phpstan-method \Aws\Result listOpenIDConnectProviders(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpenIDConnectProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpenIDConnectProvidersAsync(array{...} $args = [])
 * @method \Aws\Result listOrganizationsFeatures(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationsFeatures(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationsFeaturesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationsFeaturesAsync(array{...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{
 *     Scope?: 'AWS'|'All'|'Local',
 *     OnlyAttached?: bool,
 *     PathPrefix?: string,
 *     PolicyUsageFilter?: 'PermissionsBoundary'|'PermissionsPolicy',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{
 *     Scope?: 'AWS'|'All'|'Local',
 *     OnlyAttached?: bool,
 *     PathPrefix?: string,
 *     PolicyUsageFilter?: 'PermissionsBoundary'|'PermissionsPolicy',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPoliciesGrantingServiceAccess(array $args = [])
 * @phpstan-method \Aws\Result listPoliciesGrantingServiceAccess(array{Marker?: string, Arn?: string, ServiceNamespaces?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesGrantingServiceAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesGrantingServiceAccessAsync(array{Marker?: string, Arn?: string, ServiceNamespaces?: list<string>, ...} $args = [])
 * @method \Aws\Result listPolicyTags(array $args = [])
 * @phpstan-method \Aws\Result listPolicyTags(array{PolicyArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyTagsAsync(array{PolicyArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listPolicyVersions(array $args = [])
 * @phpstan-method \Aws\Result listPolicyVersions(array{PolicyArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array{PolicyArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listRolePolicies(array $args = [])
 * @phpstan-method \Aws\Result listRolePolicies(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRolePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRolePoliciesAsync(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listRoleTags(array $args = [])
 * @phpstan-method \Aws\Result listRoleTags(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoleTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoleTagsAsync(array{RoleName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listRoles(array $args = [])
 * @phpstan-method \Aws\Result listRoles(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRolesAsync(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listSAMLProviderTags(array $args = [])
 * @phpstan-method \Aws\Result listSAMLProviderTags(array{SAMLProviderArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSAMLProviderTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSAMLProviderTagsAsync(array{SAMLProviderArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listSAMLProviders(array $args = [])
 * @phpstan-method \Aws\Result listSAMLProviders(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSAMLProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSAMLProvidersAsync(array{...} $args = [])
 * @method \Aws\Result listSSHPublicKeys(array $args = [])
 * @phpstan-method \Aws\Result listSSHPublicKeys(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSSHPublicKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSSHPublicKeysAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listServerCertificateTags(array $args = [])
 * @phpstan-method \Aws\Result listServerCertificateTags(array{ServerCertificateName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServerCertificateTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServerCertificateTagsAsync(array{ServerCertificateName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listServerCertificates(array $args = [])
 * @phpstan-method \Aws\Result listServerCertificates(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServerCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServerCertificatesAsync(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listServiceSpecificCredentials(array $args = [])
 * @phpstan-method \Aws\Result listServiceSpecificCredentials(array{UserName?: string, ServiceName?: string, AllUsers?: bool, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceSpecificCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceSpecificCredentialsAsync(array{UserName?: string, ServiceName?: string, AllUsers?: bool, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listSigningCertificates(array $args = [])
 * @phpstan-method \Aws\Result listSigningCertificates(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSigningCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSigningCertificatesAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listUserPolicies(array $args = [])
 * @phpstan-method \Aws\Result listUserPolicies(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserPoliciesAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listUserTags(array $args = [])
 * @phpstan-method \Aws\Result listUserTags(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserTagsAsync(array{UserName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{PathPrefix?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listVirtualMFADevices(array $args = [])
 * @phpstan-method \Aws\Result listVirtualMFADevices(array{AssignmentStatus?: 'Any'|'Assigned'|'Unassigned', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualMFADevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualMFADevicesAsync(array{AssignmentStatus?: 'Any'|'Assigned'|'Unassigned', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result putGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result putGroupPolicy(array{GroupName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGroupPolicyAsync(array{GroupName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result putRolePermissionsBoundary(array $args = [])
 * @phpstan-method \Aws\Result putRolePermissionsBoundary(array{RoleName?: string, PermissionsBoundary?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putRolePermissionsBoundaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRolePermissionsBoundaryAsync(array{RoleName?: string, PermissionsBoundary?: string, ...} $args = [])
 * @method \Aws\Result putRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result putRolePolicy(array{RoleName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRolePolicyAsync(array{RoleName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result putUserPermissionsBoundary(array $args = [])
 * @phpstan-method \Aws\Result putUserPermissionsBoundary(array{UserName?: string, PermissionsBoundary?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putUserPermissionsBoundaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putUserPermissionsBoundaryAsync(array{UserName?: string, PermissionsBoundary?: string, ...} $args = [])
 * @method \Aws\Result putUserPolicy(array $args = [])
 * @phpstan-method \Aws\Result putUserPolicy(array{UserName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putUserPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putUserPolicyAsync(array{UserName?: string, PolicyName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result rejectDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectDelegationRequest(array{DelegationRequestId?: string, Notes?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectDelegationRequestAsync(array{DelegationRequestId?: string, Notes?: string, ...} $args = [])
 * @method \Aws\Result removeClientIDFromOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result removeClientIDFromOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, ClientID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeClientIDFromOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeClientIDFromOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, ClientID?: string, ...} $args = [])
 * @method \Aws\Result removeRoleFromInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result removeRoleFromInstanceProfile(array{InstanceProfileName?: string, RoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRoleFromInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRoleFromInstanceProfileAsync(array{InstanceProfileName?: string, RoleName?: string, ...} $args = [])
 * @method \Aws\Result removeUserFromGroup(array $args = [])
 * @phpstan-method \Aws\Result removeUserFromGroup(array{GroupName?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeUserFromGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeUserFromGroupAsync(array{GroupName?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result resetServiceSpecificCredential(array $args = [])
 * @phpstan-method \Aws\Result resetServiceSpecificCredential(array{UserName?: string, ServiceSpecificCredentialId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetServiceSpecificCredentialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetServiceSpecificCredentialAsync(array{UserName?: string, ServiceSpecificCredentialId?: string, ...} $args = [])
 * @method \Aws\Result resyncMFADevice(array $args = [])
 * @phpstan-method \Aws\Result resyncMFADevice(array{
 *     UserName?: string,
 *     SerialNumber?: string,
 *     AuthenticationCode1?: string,
 *     AuthenticationCode2?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resyncMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resyncMFADeviceAsync(array{
 *     UserName?: string,
 *     SerialNumber?: string,
 *     AuthenticationCode1?: string,
 *     AuthenticationCode2?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDelegationToken(array $args = [])
 * @phpstan-method \Aws\Result sendDelegationToken(array{DelegationRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDelegationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDelegationTokenAsync(array{DelegationRequestId?: string, ...} $args = [])
 * @method \Aws\Result setDefaultPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result setDefaultPolicyVersion(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array{PolicyArn?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result setSecurityTokenServicePreferences(array $args = [])
 * @phpstan-method \Aws\Result setSecurityTokenServicePreferences(array{GlobalEndpointTokenVersion?: 'v1Token'|'v2Token', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setSecurityTokenServicePreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSecurityTokenServicePreferencesAsync(array{GlobalEndpointTokenVersion?: 'v1Token'|'v2Token', ...} $args = [])
 * @method \Aws\Result simulateCustomPolicy(array $args = [])
 * @phpstan-method \Aws\Result simulateCustomPolicy(array{
 *     PolicyInputList?: list<string>,
 *     PermissionsBoundaryPolicyInputList?: list<string>,
 *     ActionNames?: list<string>,
 *     ResourceArns?: list<string>,
 *     ResourcePolicy?: string,
 *     ResourceOwner?: string,
 *     CallerArn?: string,
 *     ContextEntries?: list<array{
 *         ContextKeyName?: string,
 *         ContextKeyValues?: list<string>,
 *         ContextKeyType?: 'binary'|'binaryList'|'boolean'|'booleanList'|'date'|'dateList'|'ip'|'ipList'|'numeric'|'numericList'|'string'|'stringList',
 *         ...,
 *     }>,
 *     ResourceHandlingOption?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise simulateCustomPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise simulateCustomPolicyAsync(array{
 *     PolicyInputList?: list<string>,
 *     PermissionsBoundaryPolicyInputList?: list<string>,
 *     ActionNames?: list<string>,
 *     ResourceArns?: list<string>,
 *     ResourcePolicy?: string,
 *     ResourceOwner?: string,
 *     CallerArn?: string,
 *     ContextEntries?: list<array{
 *         ContextKeyName?: string,
 *         ContextKeyValues?: list<string>,
 *         ContextKeyType?: 'binary'|'binaryList'|'boolean'|'booleanList'|'date'|'dateList'|'ip'|'ipList'|'numeric'|'numericList'|'string'|'stringList',
 *         ...,
 *     }>,
 *     ResourceHandlingOption?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result simulatePrincipalPolicy(array $args = [])
 * @phpstan-method \Aws\Result simulatePrincipalPolicy(array{
 *     PolicySourceArn?: string,
 *     PolicyInputList?: list<string>,
 *     PermissionsBoundaryPolicyInputList?: list<string>,
 *     ActionNames?: list<string>,
 *     ResourceArns?: list<string>,
 *     ResourcePolicy?: string,
 *     ResourceOwner?: string,
 *     CallerArn?: string,
 *     ContextEntries?: list<array{
 *         ContextKeyName?: string,
 *         ContextKeyValues?: list<string>,
 *         ContextKeyType?: 'binary'|'binaryList'|'boolean'|'booleanList'|'date'|'dateList'|'ip'|'ipList'|'numeric'|'numericList'|'string'|'stringList',
 *         ...,
 *     }>,
 *     ResourceHandlingOption?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise simulatePrincipalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise simulatePrincipalPolicyAsync(array{
 *     PolicySourceArn?: string,
 *     PolicyInputList?: list<string>,
 *     PermissionsBoundaryPolicyInputList?: list<string>,
 *     ActionNames?: list<string>,
 *     ResourceArns?: list<string>,
 *     ResourcePolicy?: string,
 *     ResourceOwner?: string,
 *     CallerArn?: string,
 *     ContextEntries?: list<array{
 *         ContextKeyName?: string,
 *         ContextKeyValues?: list<string>,
 *         ContextKeyType?: 'binary'|'binaryList'|'boolean'|'booleanList'|'date'|'dateList'|'ip'|'ipList'|'numeric'|'numericList'|'string'|'stringList',
 *         ...,
 *     }>,
 *     ResourceHandlingOption?: string,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result tagInstanceProfile(array{InstanceProfileName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagInstanceProfileAsync(array{InstanceProfileName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagMFADevice(array $args = [])
 * @phpstan-method \Aws\Result tagMFADevice(array{SerialNumber?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagMFADeviceAsync(array{SerialNumber?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result tagOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagPolicy(array $args = [])
 * @phpstan-method \Aws\Result tagPolicy(array{PolicyArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagPolicyAsync(array{PolicyArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagRole(array $args = [])
 * @phpstan-method \Aws\Result tagRole(array{RoleName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagRoleAsync(array{RoleName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result tagSAMLProvider(array{SAMLProviderArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagSAMLProviderAsync(array{SAMLProviderArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result tagServerCertificate(array{ServerCertificateName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagServerCertificateAsync(array{ServerCertificateName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result tagUser(array $args = [])
 * @phpstan-method \Aws\Result tagUser(array{UserName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagUserAsync(array{UserName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result untagInstanceProfile(array{InstanceProfileName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagInstanceProfileAsync(array{InstanceProfileName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagMFADevice(array $args = [])
 * @phpstan-method \Aws\Result untagMFADevice(array{SerialNumber?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagMFADeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagMFADeviceAsync(array{SerialNumber?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagOpenIDConnectProvider(array $args = [])
 * @phpstan-method \Aws\Result untagOpenIDConnectProvider(array{OpenIDConnectProviderArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagOpenIDConnectProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagOpenIDConnectProviderAsync(array{OpenIDConnectProviderArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagPolicy(array $args = [])
 * @phpstan-method \Aws\Result untagPolicy(array{PolicyArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagPolicyAsync(array{PolicyArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagRole(array $args = [])
 * @phpstan-method \Aws\Result untagRole(array{RoleName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagRoleAsync(array{RoleName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result untagSAMLProvider(array{SAMLProviderArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagSAMLProviderAsync(array{SAMLProviderArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result untagServerCertificate(array{ServerCertificateName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagServerCertificateAsync(array{ServerCertificateName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagUser(array $args = [])
 * @phpstan-method \Aws\Result untagUser(array{UserName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagUserAsync(array{UserName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessKey(array $args = [])
 * @phpstan-method \Aws\Result updateAccessKey(array{UserName?: string, AccessKeyId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessKeyAsync(array{UserName?: string, AccessKeyId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \Aws\Result updateAccountPasswordPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAccountPasswordPolicy(array{
 *     MinimumPasswordLength?: int,
 *     RequireSymbols?: bool,
 *     RequireNumbers?: bool,
 *     RequireUppercaseCharacters?: bool,
 *     RequireLowercaseCharacters?: bool,
 *     AllowUsersToChangePassword?: bool,
 *     MaxPasswordAge?: int,
 *     PasswordReusePrevention?: int,
 *     HardExpiry?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountPasswordPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountPasswordPolicyAsync(array{
 *     MinimumPasswordLength?: int,
 *     RequireSymbols?: bool,
 *     RequireNumbers?: bool,
 *     RequireUppercaseCharacters?: bool,
 *     RequireLowercaseCharacters?: bool,
 *     AllowUsersToChangePassword?: bool,
 *     MaxPasswordAge?: int,
 *     PasswordReusePrevention?: int,
 *     HardExpiry?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssumeRolePolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAssumeRolePolicy(array{RoleName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssumeRolePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssumeRolePolicyAsync(array{RoleName?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result updateDelegationRequest(array $args = [])
 * @phpstan-method \Aws\Result updateDelegationRequest(array{DelegationRequestId?: string, Notes?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDelegationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDelegationRequestAsync(array{DelegationRequestId?: string, Notes?: string, ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{GroupName?: string, NewPath?: string, NewGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{GroupName?: string, NewPath?: string, NewGroupName?: string, ...} $args = [])
 * @method \Aws\Result updateLoginProfile(array $args = [])
 * @phpstan-method \Aws\Result updateLoginProfile(array{UserName?: string, Password?: string, PasswordResetRequired?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoginProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoginProfileAsync(array{UserName?: string, Password?: string, PasswordResetRequired?: bool, ...} $args = [])
 * @method \Aws\Result updateOpenIDConnectProviderThumbprint(array $args = [])
 * @phpstan-method \Aws\Result updateOpenIDConnectProviderThumbprint(array{OpenIDConnectProviderArn?: string, ThumbprintList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOpenIDConnectProviderThumbprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOpenIDConnectProviderThumbprintAsync(array{OpenIDConnectProviderArn?: string, ThumbprintList?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRole(array $args = [])
 * @phpstan-method \Aws\Result updateRole(array{RoleName?: string, Description?: string, MaxSessionDuration?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoleAsync(array{RoleName?: string, Description?: string, MaxSessionDuration?: int, ...} $args = [])
 * @method \Aws\Result updateRoleDescription(array $args = [])
 * @phpstan-method \Aws\Result updateRoleDescription(array{RoleName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoleDescriptionAsync(array{RoleName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateSAMLProvider(array $args = [])
 * @phpstan-method \Aws\Result updateSAMLProvider(array{
 *     SAMLMetadataDocument?: string,
 *     SAMLProviderArn?: string,
 *     AssertionEncryptionMode?: 'Allowed'|'Required',
 *     AddPrivateKey?: string,
 *     RemovePrivateKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSAMLProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSAMLProviderAsync(array{
 *     SAMLMetadataDocument?: string,
 *     SAMLProviderArn?: string,
 *     AssertionEncryptionMode?: 'Allowed'|'Required',
 *     AddPrivateKey?: string,
 *     RemovePrivateKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result updateSSHPublicKey(array{UserName?: string, SSHPublicKeyId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSSHPublicKeyAsync(array{UserName?: string, SSHPublicKeyId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \Aws\Result updateServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result updateServerCertificate(array{ServerCertificateName?: string, NewPath?: string, NewServerCertificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServerCertificateAsync(array{ServerCertificateName?: string, NewPath?: string, NewServerCertificateName?: string, ...} $args = [])
 * @method \Aws\Result updateServiceSpecificCredential(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSpecificCredential(array{UserName?: string, ServiceSpecificCredentialId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSpecificCredentialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSpecificCredentialAsync(array{UserName?: string, ServiceSpecificCredentialId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \Aws\Result updateSigningCertificate(array $args = [])
 * @phpstan-method \Aws\Result updateSigningCertificate(array{UserName?: string, CertificateId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSigningCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSigningCertificateAsync(array{UserName?: string, CertificateId?: string, Status?: 'Active'|'Expired'|'Inactive', ...} $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{UserName?: string, NewPath?: string, NewUserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{UserName?: string, NewPath?: string, NewUserName?: string, ...} $args = [])
 * @method \Aws\Result uploadSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result uploadSSHPublicKey(array{UserName?: string, SSHPublicKeyBody?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadSSHPublicKeyAsync(array{UserName?: string, SSHPublicKeyBody?: string, ...} $args = [])
 * @method \Aws\Result uploadServerCertificate(array $args = [])
 * @phpstan-method \Aws\Result uploadServerCertificate(array{
 *     Path?: string,
 *     ServerCertificateName?: string,
 *     CertificateBody?: string,
 *     PrivateKey?: string,
 *     CertificateChain?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadServerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadServerCertificateAsync(array{
 *     Path?: string,
 *     ServerCertificateName?: string,
 *     CertificateBody?: string,
 *     PrivateKey?: string,
 *     CertificateChain?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadSigningCertificate(array $args = [])
 * @phpstan-method \Aws\Result uploadSigningCertificate(array{UserName?: string, CertificateBody?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadSigningCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadSigningCertificateAsync(array{UserName?: string, CertificateBody?: string, ...} $args = [])
 */
class IamClient extends AwsClient {}
