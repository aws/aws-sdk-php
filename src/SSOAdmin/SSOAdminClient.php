<?php
namespace Aws\SSOAdmin;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Single Sign-On Admin** service.
 * @method \Aws\Result addRegion(array $args = [])
 * @phpstan-method \Aws\Result addRegion(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addRegionAsync(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result attachCustomerManagedPolicyReferenceToPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result attachCustomerManagedPolicyReferenceToPermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachCustomerManagedPolicyReferenceToPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachCustomerManagedPolicyReferenceToPermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachManagedPolicyToPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result attachManagedPolicyToPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ManagedPolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachManagedPolicyToPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachManagedPolicyToPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ManagedPolicyArn?: string, ...} $args = [])
 * @method \Aws\Result createAccountAssignment(array $args = [])
 * @phpstan-method \Aws\Result createAccountAssignment(array{
 *     InstanceArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'AWS_ACCOUNT',
 *     PermissionSetArn?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     PrincipalId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountAssignmentAsync(array{
 *     InstanceArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'AWS_ACCOUNT',
 *     PermissionSetArn?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     PrincipalId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     InstanceArn?: string,
 *     ApplicationProviderArn?: string,
 *     Name?: string,
 *     Description?: string,
 *     PortalOptions?: array{
 *         SignInOptions?: array{Origin?: 'APPLICATION'|'IDENTITY_CENTER', ApplicationUrl?: string, ...},
 *         Visibility?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Status?: 'DISABLED'|'ENABLED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     InstanceArn?: string,
 *     ApplicationProviderArn?: string,
 *     Name?: string,
 *     Description?: string,
 *     PortalOptions?: array{
 *         SignInOptions?: array{Origin?: 'APPLICATION'|'IDENTITY_CENTER', ApplicationUrl?: string, ...},
 *         Visibility?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Status?: 'DISABLED'|'ENABLED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplicationAssignment(array $args = [])
 * @phpstan-method \Aws\Result createApplicationAssignment(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAssignmentAsync(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \Aws\Result createInstance(array $args = [])
 * @phpstan-method \Aws\Result createInstance(array{Name?: string, ClientToken?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceAsync(array{Name?: string, ClientToken?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createInstanceAccessControlAttributeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createInstanceAccessControlAttributeConfiguration(array{
 *     InstanceArn?: string,
 *     InstanceAccessControlAttributeConfiguration?: array{AccessControlAttributes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceAccessControlAttributeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceAccessControlAttributeConfigurationAsync(array{
 *     InstanceArn?: string,
 *     InstanceAccessControlAttributeConfiguration?: array{AccessControlAttributes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result createPermissionSet(array{
 *     Name?: string,
 *     Description?: string,
 *     InstanceArn?: string,
 *     SessionDuration?: string,
 *     RelayState?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPermissionSetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     InstanceArn?: string,
 *     SessionDuration?: string,
 *     RelayState?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustedTokenIssuer(array $args = [])
 * @phpstan-method \Aws\Result createTrustedTokenIssuer(array{
 *     InstanceArn?: string,
 *     Name?: string,
 *     TrustedTokenIssuerType?: 'OIDC_JWT',
 *     TrustedTokenIssuerConfiguration?: array{
 *         OidcJwtConfiguration?: array{
 *             IssuerUrl?: string,
 *             ClaimAttributePath?: string,
 *             IdentityStoreAttributePath?: string,
 *             JwksRetrievalOption?: 'OPEN_ID_DISCOVERY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustedTokenIssuerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustedTokenIssuerAsync(array{
 *     InstanceArn?: string,
 *     Name?: string,
 *     TrustedTokenIssuerType?: 'OIDC_JWT',
 *     TrustedTokenIssuerConfiguration?: array{
 *         OidcJwtConfiguration?: array{
 *             IssuerUrl?: string,
 *             ClaimAttributePath?: string,
 *             IdentityStoreAttributePath?: string,
 *             JwksRetrievalOption?: 'OPEN_ID_DISCOVERY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountAssignment(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountAssignment(array{
 *     InstanceArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'AWS_ACCOUNT',
 *     PermissionSetArn?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     PrincipalId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAssignmentAsync(array{
 *     InstanceArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'AWS_ACCOUNT',
 *     PermissionSetArn?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     PrincipalId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationAccessScope(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationAccessScope(array{ApplicationArn?: string, Scope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAccessScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAccessScopeAsync(array{ApplicationArn?: string, Scope?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationAssignment(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationAssignment(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAssignmentAsync(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \Aws\Result deleteApplicationAuthenticationMethod(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationAuthenticationMethod(array{ApplicationArn?: string, AuthenticationMethodType?: 'IAM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAuthenticationMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAuthenticationMethodAsync(array{ApplicationArn?: string, AuthenticationMethodType?: 'IAM', ...} $args = [])
 * @method \Aws\Result deleteApplicationGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationGrant(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationGrantAsync(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInlinePolicyFromPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result deleteInlinePolicyFromPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInlinePolicyFromPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInlinePolicyFromPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteInstance(array{InstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array{InstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteInstanceAccessControlAttributeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceAccessControlAttributeConfiguration(array{InstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceAccessControlAttributeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceAccessControlAttributeConfigurationAsync(array{InstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deletePermissionSet(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result deletePermissionsBoundaryFromPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionsBoundaryFromPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionsBoundaryFromPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionsBoundaryFromPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustedTokenIssuer(array $args = [])
 * @phpstan-method \Aws\Result deleteTrustedTokenIssuer(array{TrustedTokenIssuerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustedTokenIssuerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustedTokenIssuerAsync(array{TrustedTokenIssuerArn?: string, ...} $args = [])
 * @method \Aws\Result describeAccountAssignmentCreationStatus(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAssignmentCreationStatus(array{InstanceArn?: string, AccountAssignmentCreationRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAssignmentCreationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAssignmentCreationStatusAsync(array{InstanceArn?: string, AccountAssignmentCreationRequestId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountAssignmentDeletionStatus(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAssignmentDeletionStatus(array{InstanceArn?: string, AccountAssignmentDeletionRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAssignmentDeletionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAssignmentDeletionStatusAsync(array{InstanceArn?: string, AccountAssignmentDeletionRequestId?: string, ...} $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @phpstan-method \Aws\Result describeApplication(array{ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAsync(array{ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result describeApplicationAssignment(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationAssignment(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAssignmentAsync(array{ApplicationArn?: string, PrincipalId?: string, PrincipalType?: 'GROUP'|'USER', ...} $args = [])
 * @method \Aws\Result describeApplicationProvider(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationProvider(array{ApplicationProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationProviderAsync(array{ApplicationProviderArn?: string, ...} $args = [])
 * @method \Aws\Result describeInstance(array $args = [])
 * @phpstan-method \Aws\Result describeInstance(array{InstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceAsync(array{InstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeInstanceAccessControlAttributeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceAccessControlAttributeConfiguration(array{InstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceAccessControlAttributeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceAccessControlAttributeConfigurationAsync(array{InstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describePermissionSet(array $args = [])
 * @phpstan-method \Aws\Result describePermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result describePermissionSetProvisioningStatus(array $args = [])
 * @phpstan-method \Aws\Result describePermissionSetProvisioningStatus(array{InstanceArn?: string, ProvisionPermissionSetRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePermissionSetProvisioningStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePermissionSetProvisioningStatusAsync(array{InstanceArn?: string, ProvisionPermissionSetRequestId?: string, ...} $args = [])
 * @method \Aws\Result describeRegion(array $args = [])
 * @phpstan-method \Aws\Result describeRegion(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegionAsync(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result describeTrustedTokenIssuer(array $args = [])
 * @phpstan-method \Aws\Result describeTrustedTokenIssuer(array{TrustedTokenIssuerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustedTokenIssuerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustedTokenIssuerAsync(array{TrustedTokenIssuerArn?: string, ...} $args = [])
 * @method \Aws\Result detachCustomerManagedPolicyReferenceFromPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result detachCustomerManagedPolicyReferenceFromPermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachCustomerManagedPolicyReferenceFromPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachCustomerManagedPolicyReferenceFromPermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result detachManagedPolicyFromPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result detachManagedPolicyFromPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ManagedPolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachManagedPolicyFromPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachManagedPolicyFromPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ManagedPolicyArn?: string, ...} $args = [])
 * @method \Aws\Result getApplicationAccessScope(array $args = [])
 * @phpstan-method \Aws\Result getApplicationAccessScope(array{ApplicationArn?: string, Scope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAccessScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAccessScopeAsync(array{ApplicationArn?: string, Scope?: string, ...} $args = [])
 * @method \Aws\Result getApplicationAssignmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getApplicationAssignmentConfiguration(array{ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAssignmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAssignmentConfigurationAsync(array{ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result getApplicationAuthenticationMethod(array $args = [])
 * @phpstan-method \Aws\Result getApplicationAuthenticationMethod(array{ApplicationArn?: string, AuthenticationMethodType?: 'IAM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAuthenticationMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAuthenticationMethodAsync(array{ApplicationArn?: string, AuthenticationMethodType?: 'IAM', ...} $args = [])
 * @method \Aws\Result getApplicationGrant(array $args = [])
 * @phpstan-method \Aws\Result getApplicationGrant(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationGrantAsync(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getApplicationSessionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getApplicationSessionConfiguration(array{ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationSessionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationSessionConfigurationAsync(array{ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result getInlinePolicyForPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result getInlinePolicyForPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInlinePolicyForPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInlinePolicyForPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result getPermissionsBoundaryForPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result getPermissionsBoundaryForPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPermissionsBoundaryForPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPermissionsBoundaryForPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, ...} $args = [])
 * @method \Aws\Result listAccountAssignmentCreationStatus(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssignmentCreationStatus(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssignmentCreationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssignmentCreationStatusAsync(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountAssignmentDeletionStatus(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssignmentDeletionStatus(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssignmentDeletionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssignmentDeletionStatusAsync(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountAssignments(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssignments(array{
 *     InstanceArn?: string,
 *     AccountId?: string,
 *     PermissionSetArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssignmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssignmentsAsync(array{
 *     InstanceArn?: string,
 *     AccountId?: string,
 *     PermissionSetArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountAssignmentsForPrincipal(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssignmentsForPrincipal(array{
 *     InstanceArn?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     Filter?: array{AccountId?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssignmentsForPrincipalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssignmentsForPrincipalAsync(array{
 *     InstanceArn?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     Filter?: array{AccountId?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountsForProvisionedPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result listAccountsForProvisionedPermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     ProvisioningStatus?: 'LATEST_PERMISSION_SET_NOT_PROVISIONED'|'LATEST_PERMISSION_SET_PROVISIONED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsForProvisionedPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsForProvisionedPermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     ProvisioningStatus?: 'LATEST_PERMISSION_SET_NOT_PROVISIONED'|'LATEST_PERMISSION_SET_PROVISIONED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplicationAccessScopes(array $args = [])
 * @phpstan-method \Aws\Result listApplicationAccessScopes(array{ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationAccessScopesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationAccessScopesAsync(array{ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplicationAssignments(array $args = [])
 * @phpstan-method \Aws\Result listApplicationAssignments(array{ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationAssignmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationAssignmentsAsync(array{ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplicationAssignmentsForPrincipal(array $args = [])
 * @phpstan-method \Aws\Result listApplicationAssignmentsForPrincipal(array{
 *     InstanceArn?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     Filter?: array{ApplicationArn?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationAssignmentsForPrincipalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationAssignmentsForPrincipalAsync(array{
 *     InstanceArn?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'GROUP'|'USER',
 *     Filter?: array{ApplicationArn?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplicationAuthenticationMethods(array $args = [])
 * @phpstan-method \Aws\Result listApplicationAuthenticationMethods(array{ApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationAuthenticationMethodsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationAuthenticationMethodsAsync(array{ApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplicationGrants(array $args = [])
 * @phpstan-method \Aws\Result listApplicationGrants(array{ApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationGrantsAsync(array{ApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplicationProviders(array $args = [])
 * @phpstan-method \Aws\Result listApplicationProviders(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationProvidersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{ApplicationAccount?: string, ApplicationProvider?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{ApplicationAccount?: string, ApplicationProvider?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomerManagedPolicyReferencesInPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result listCustomerManagedPolicyReferencesInPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomerManagedPolicyReferencesInPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomerManagedPolicyReferencesInPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedPoliciesInPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result listManagedPoliciesInPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedPoliciesInPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedPoliciesInPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPermissionSetProvisioningStatus(array $args = [])
 * @phpstan-method \Aws\Result listPermissionSetProvisioningStatus(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionSetProvisioningStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionSetProvisioningStatusAsync(array{
 *     InstanceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filter?: array{Status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPermissionSets(array $args = [])
 * @phpstan-method \Aws\Result listPermissionSets(array{InstanceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionSetsAsync(array{InstanceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPermissionSetsProvisionedToAccount(array $args = [])
 * @phpstan-method \Aws\Result listPermissionSetsProvisionedToAccount(array{
 *     InstanceArn?: string,
 *     AccountId?: string,
 *     ProvisioningStatus?: 'LATEST_PERMISSION_SET_NOT_PROVISIONED'|'LATEST_PERMISSION_SET_PROVISIONED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionSetsProvisionedToAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionSetsProvisionedToAccountAsync(array{
 *     InstanceArn?: string,
 *     AccountId?: string,
 *     ProvisioningStatus?: 'LATEST_PERMISSION_SET_NOT_PROVISIONED'|'LATEST_PERMISSION_SET_PROVISIONED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegions(array $args = [])
 * @phpstan-method \Aws\Result listRegions(array{InstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegionsAsync(array{InstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{InstanceArn?: string, ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{InstanceArn?: string, ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTrustedTokenIssuers(array $args = [])
 * @phpstan-method \Aws\Result listTrustedTokenIssuers(array{InstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustedTokenIssuersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustedTokenIssuersAsync(array{InstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result provisionPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result provisionPermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'ALL_PROVISIONED_ACCOUNTS'|'AWS_ACCOUNT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise provisionPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise provisionPermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     TargetId?: string,
 *     TargetType?: 'ALL_PROVISIONED_ACCOUNTS'|'AWS_ACCOUNT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putApplicationAccessScope(array $args = [])
 * @phpstan-method \Aws\Result putApplicationAccessScope(array{Scope?: string, AuthorizedTargets?: list<string>, ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationAccessScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationAccessScopeAsync(array{Scope?: string, AuthorizedTargets?: list<string>, ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result putApplicationAssignmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putApplicationAssignmentConfiguration(array{ApplicationArn?: string, AssignmentRequired?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationAssignmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationAssignmentConfigurationAsync(array{ApplicationArn?: string, AssignmentRequired?: bool, ...} $args = [])
 * @method \Aws\Result putApplicationAuthenticationMethod(array $args = [])
 * @phpstan-method \Aws\Result putApplicationAuthenticationMethod(array{
 *     ApplicationArn?: string,
 *     AuthenticationMethodType?: 'IAM',
 *     AuthenticationMethod?: array{Iam?: array{ActorPolicy?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationAuthenticationMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationAuthenticationMethodAsync(array{
 *     ApplicationArn?: string,
 *     AuthenticationMethodType?: 'IAM',
 *     AuthenticationMethod?: array{Iam?: array{ActorPolicy?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putApplicationGrant(array $args = [])
 * @phpstan-method \Aws\Result putApplicationGrant(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     Grant?: array{
 *         AuthorizationCode?: array{RedirectUris?: list<string>, ...},
 *         JwtBearer?: array{AuthorizedTokenIssuers?: list<array>, ...},
 *         RefreshToken?: array,
 *         TokenExchange?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationGrantAsync(array{
 *     ApplicationArn?: string,
 *     GrantType?: 'authorization_code'|'refresh_token'|'urn:ietf:params:oauth:grant-type:jwt-bearer'|'urn:ietf:params:oauth:grant-type:token-exchange',
 *     Grant?: array{
 *         AuthorizationCode?: array{RedirectUris?: list<string>, ...},
 *         JwtBearer?: array{AuthorizedTokenIssuers?: list<array>, ...},
 *         RefreshToken?: array,
 *         TokenExchange?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putApplicationSessionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putApplicationSessionConfiguration(array{ApplicationArn?: string, UserBackgroundSessionApplicationStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationSessionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationSessionConfigurationAsync(array{ApplicationArn?: string, UserBackgroundSessionApplicationStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result putInlinePolicyToPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result putInlinePolicyToPermissionSet(array{InstanceArn?: string, PermissionSetArn?: string, InlinePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putInlinePolicyToPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInlinePolicyToPermissionSetAsync(array{InstanceArn?: string, PermissionSetArn?: string, InlinePolicy?: string, ...} $args = [])
 * @method \Aws\Result putPermissionsBoundaryToPermissionSet(array $args = [])
 * @phpstan-method \Aws\Result putPermissionsBoundaryToPermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     PermissionsBoundary?: array{
 *         CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *         ManagedPolicyArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPermissionsBoundaryToPermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPermissionsBoundaryToPermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     PermissionsBoundary?: array{
 *         CustomerManagedPolicyReference?: array{Name?: string, Path?: string, ...},
 *         ManagedPolicyArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeRegion(array $args = [])
 * @phpstan-method \Aws\Result removeRegion(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRegionAsync(array{InstanceArn?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{InstanceArn?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{InstanceArn?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{InstanceArn?: string, ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{InstanceArn?: string, ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     ApplicationArn?: string,
 *     Name?: string,
 *     Description?: string,
 *     Status?: 'DISABLED'|'ENABLED',
 *     PortalOptions?: array{SignInOptions?: array{Origin?: 'APPLICATION'|'IDENTITY_CENTER', ApplicationUrl?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     ApplicationArn?: string,
 *     Name?: string,
 *     Description?: string,
 *     Status?: 'DISABLED'|'ENABLED',
 *     PortalOptions?: array{SignInOptions?: array{Origin?: 'APPLICATION'|'IDENTITY_CENTER', ApplicationUrl?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstance(array $args = [])
 * @phpstan-method \Aws\Result updateInstance(array{
 *     Name?: string,
 *     InstanceArn?: string,
 *     EncryptionConfiguration?: array{KeyType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceAsync(array{
 *     Name?: string,
 *     InstanceArn?: string,
 *     EncryptionConfiguration?: array{KeyType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstanceAccessControlAttributeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceAccessControlAttributeConfiguration(array{
 *     InstanceArn?: string,
 *     InstanceAccessControlAttributeConfiguration?: array{AccessControlAttributes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceAccessControlAttributeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceAccessControlAttributeConfigurationAsync(array{
 *     InstanceArn?: string,
 *     InstanceAccessControlAttributeConfiguration?: array{AccessControlAttributes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePermissionSet(array $args = [])
 * @phpstan-method \Aws\Result updatePermissionSet(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     Description?: string,
 *     SessionDuration?: string,
 *     RelayState?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePermissionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePermissionSetAsync(array{
 *     InstanceArn?: string,
 *     PermissionSetArn?: string,
 *     Description?: string,
 *     SessionDuration?: string,
 *     RelayState?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrustedTokenIssuer(array $args = [])
 * @phpstan-method \Aws\Result updateTrustedTokenIssuer(array{
 *     TrustedTokenIssuerArn?: string,
 *     Name?: string,
 *     TrustedTokenIssuerConfiguration?: array{
 *         OidcJwtConfiguration?: array{
 *             ClaimAttributePath?: string,
 *             IdentityStoreAttributePath?: string,
 *             JwksRetrievalOption?: 'OPEN_ID_DISCOVERY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustedTokenIssuerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustedTokenIssuerAsync(array{
 *     TrustedTokenIssuerArn?: string,
 *     Name?: string,
 *     TrustedTokenIssuerConfiguration?: array{
 *         OidcJwtConfiguration?: array{
 *             ClaimAttributePath?: string,
 *             IdentityStoreAttributePath?: string,
 *             JwksRetrievalOption?: 'OPEN_ID_DISCOVERY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class SSOAdminClient extends AwsClient {}
