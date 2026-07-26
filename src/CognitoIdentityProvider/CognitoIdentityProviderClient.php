<?php
namespace Aws\CognitoIdentityProvider;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Identity Provider** service.
 * 
 * @method \Aws\Result addCustomAttributes(array $args = [])
 * @phpstan-method \Aws\Result addCustomAttributes(array{
 *     UserPoolId?: string,
 *     CustomAttributes?: list<array{
 *         Name?: string,
 *         AttributeDataType?: 'Boolean'|'DateTime'|'Number'|'String',
 *         DeveloperOnlyAttribute?: bool,
 *         Mutable?: bool,
 *         Required?: bool,
 *         NumberAttributeConstraints?: array,
 *         StringAttributeConstraints?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addCustomAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addCustomAttributesAsync(array{
 *     UserPoolId?: string,
 *     CustomAttributes?: list<array{
 *         Name?: string,
 *         AttributeDataType?: 'Boolean'|'DateTime'|'Number'|'String',
 *         DeveloperOnlyAttribute?: bool,
 *         Mutable?: bool,
 *         Required?: bool,
 *         NumberAttributeConstraints?: array,
 *         StringAttributeConstraints?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addUserPoolClientSecret(array $args = [])
 * @phpstan-method \Aws\Result addUserPoolClientSecret(array{UserPoolId?: string, ClientId?: string, ClientSecret?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addUserPoolClientSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addUserPoolClientSecretAsync(array{UserPoolId?: string, ClientId?: string, ClientSecret?: string, ...} $args = [])
 * @method \Aws\Result adminAddUserToGroup(array $args = [])
 * @phpstan-method \Aws\Result adminAddUserToGroup(array{UserPoolId?: string, Username?: string, GroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminAddUserToGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminAddUserToGroupAsync(array{UserPoolId?: string, Username?: string, GroupName?: string, ...} $args = [])
 * @method \Aws\Result adminConfirmSignUp(array $args = [])
 * @phpstan-method \Aws\Result adminConfirmSignUp(array{UserPoolId?: string, Username?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminConfirmSignUpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminConfirmSignUpAsync(array{UserPoolId?: string, Username?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \Aws\Result adminCreateUser(array $args = [])
 * @phpstan-method \Aws\Result adminCreateUser(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ValidationData?: list<array{Name?: string, Value?: string, ...}>,
 *     TemporaryPassword?: string,
 *     ForceAliasCreation?: bool,
 *     MessageAction?: 'RESEND'|'SUPPRESS',
 *     DesiredDeliveryMediums?: list<'EMAIL'|'SMS'>,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminCreateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminCreateUserAsync(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ValidationData?: list<array{Name?: string, Value?: string, ...}>,
 *     TemporaryPassword?: string,
 *     ForceAliasCreation?: bool,
 *     MessageAction?: 'RESEND'|'SUPPRESS',
 *     DesiredDeliveryMediums?: list<'EMAIL'|'SMS'>,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminDeleteUser(array $args = [])
 * @phpstan-method \Aws\Result adminDeleteUser(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminDeleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminDeleteUserAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminDeleteUserAttributes(array $args = [])
 * @phpstan-method \Aws\Result adminDeleteUserAttributes(array{UserPoolId?: string, Username?: string, UserAttributeNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminDeleteUserAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminDeleteUserAttributesAsync(array{UserPoolId?: string, Username?: string, UserAttributeNames?: list<string>, ...} $args = [])
 * @method \Aws\Result adminDisableProviderForUser(array $args = [])
 * @phpstan-method \Aws\Result adminDisableProviderForUser(array{
 *     UserPoolId?: string,
 *     User?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminDisableProviderForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminDisableProviderForUserAsync(array{
 *     UserPoolId?: string,
 *     User?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminDisableUser(array $args = [])
 * @phpstan-method \Aws\Result adminDisableUser(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminDisableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminDisableUserAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminEnableUser(array $args = [])
 * @phpstan-method \Aws\Result adminEnableUser(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminEnableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminEnableUserAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminForgetDevice(array $args = [])
 * @phpstan-method \Aws\Result adminForgetDevice(array{UserPoolId?: string, Username?: string, DeviceKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminForgetDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminForgetDeviceAsync(array{UserPoolId?: string, Username?: string, DeviceKey?: string, ...} $args = [])
 * @method \Aws\Result adminGetDevice(array $args = [])
 * @phpstan-method \Aws\Result adminGetDevice(array{DeviceKey?: string, UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminGetDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminGetDeviceAsync(array{DeviceKey?: string, UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminGetUser(array $args = [])
 * @phpstan-method \Aws\Result adminGetUser(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminGetUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminGetUserAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminGetUserAuthFactors(array $args = [])
 * @phpstan-method \Aws\Result adminGetUserAuthFactors(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminGetUserAuthFactorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminGetUserAuthFactorsAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result adminInitiateAuth(array $args = [])
 * @phpstan-method \Aws\Result adminInitiateAuth(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     AuthFlow?: 'ADMIN_NO_SRP_AUTH'|'ADMIN_USER_PASSWORD_AUTH'|'CUSTOM_AUTH'|'REFRESH_TOKEN'|'REFRESH_TOKEN_AUTH'|'USER_AUTH'|'USER_PASSWORD_AUTH'|'USER_SRP_AUTH',
 *     AuthParameters?: array<string, string>,
 *     ClientMetadata?: array<string, string>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ContextData?: array{
 *         IpAddress?: string,
 *         ServerName?: string,
 *         ServerPath?: string,
 *         HttpHeaders?: list<array>,
 *         EncodedData?: string,
 *         ...,
 *     },
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminInitiateAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminInitiateAuthAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     AuthFlow?: 'ADMIN_NO_SRP_AUTH'|'ADMIN_USER_PASSWORD_AUTH'|'CUSTOM_AUTH'|'REFRESH_TOKEN'|'REFRESH_TOKEN_AUTH'|'USER_AUTH'|'USER_PASSWORD_AUTH'|'USER_SRP_AUTH',
 *     AuthParameters?: array<string, string>,
 *     ClientMetadata?: array<string, string>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ContextData?: array{
 *         IpAddress?: string,
 *         ServerName?: string,
 *         ServerPath?: string,
 *         HttpHeaders?: list<array>,
 *         EncodedData?: string,
 *         ...,
 *     },
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminLinkProviderForUser(array $args = [])
 * @phpstan-method \Aws\Result adminLinkProviderForUser(array{
 *     UserPoolId?: string,
 *     DestinationUser?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     SourceUser?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminLinkProviderForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminLinkProviderForUserAsync(array{
 *     UserPoolId?: string,
 *     DestinationUser?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     SourceUser?: array{ProviderName?: string, ProviderAttributeName?: string, ProviderAttributeValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminListDevices(array $args = [])
 * @phpstan-method \Aws\Result adminListDevices(array{UserPoolId?: string, Username?: string, Limit?: int, PaginationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminListDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminListDevicesAsync(array{UserPoolId?: string, Username?: string, Limit?: int, PaginationToken?: string, ...} $args = [])
 * @method \Aws\Result adminListGroupsForUser(array $args = [])
 * @phpstan-method \Aws\Result adminListGroupsForUser(array{Username?: string, UserPoolId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminListGroupsForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminListGroupsForUserAsync(array{Username?: string, UserPoolId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result adminListUserAuthEvents(array $args = [])
 * @phpstan-method \Aws\Result adminListUserAuthEvents(array{UserPoolId?: string, Username?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminListUserAuthEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminListUserAuthEventsAsync(array{UserPoolId?: string, Username?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result adminRemoveUserFromGroup(array $args = [])
 * @phpstan-method \Aws\Result adminRemoveUserFromGroup(array{UserPoolId?: string, Username?: string, GroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminRemoveUserFromGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminRemoveUserFromGroupAsync(array{UserPoolId?: string, Username?: string, GroupName?: string, ...} $args = [])
 * @method \Aws\Result adminResetUserPassword(array $args = [])
 * @phpstan-method \Aws\Result adminResetUserPassword(array{UserPoolId?: string, Username?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminResetUserPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminResetUserPasswordAsync(array{UserPoolId?: string, Username?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \Aws\Result adminRespondToAuthChallenge(array $args = [])
 * @phpstan-method \Aws\Result adminRespondToAuthChallenge(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     ChallengeName?: 'ADMIN_NO_SRP_AUTH'|'CUSTOM_CHALLENGE'|'DEVICE_PASSWORD_VERIFIER'|'DEVICE_SRP_AUTH'|'EMAIL_OTP'|'MFA_SETUP'|'NEW_PASSWORD_REQUIRED'|'PASSWORD'|'PASSWORD_SRP'|'PASSWORD_VERIFIER'|'SELECT_CHALLENGE'|'SELECT_MFA_TYPE'|'SMS_MFA'|'SMS_OTP'|'SOFTWARE_TOKEN_MFA'|'WEB_AUTHN',
 *     ChallengeResponses?: array<string, string>,
 *     Session?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ContextData?: array{
 *         IpAddress?: string,
 *         ServerName?: string,
 *         ServerPath?: string,
 *         HttpHeaders?: list<array>,
 *         EncodedData?: string,
 *         ...,
 *     },
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminRespondToAuthChallengeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminRespondToAuthChallengeAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     ChallengeName?: 'ADMIN_NO_SRP_AUTH'|'CUSTOM_CHALLENGE'|'DEVICE_PASSWORD_VERIFIER'|'DEVICE_SRP_AUTH'|'EMAIL_OTP'|'MFA_SETUP'|'NEW_PASSWORD_REQUIRED'|'PASSWORD'|'PASSWORD_SRP'|'PASSWORD_VERIFIER'|'SELECT_CHALLENGE'|'SELECT_MFA_TYPE'|'SMS_MFA'|'SMS_OTP'|'SOFTWARE_TOKEN_MFA'|'WEB_AUTHN',
 *     ChallengeResponses?: array<string, string>,
 *     Session?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ContextData?: array{
 *         IpAddress?: string,
 *         ServerName?: string,
 *         ServerPath?: string,
 *         HttpHeaders?: list<array>,
 *         EncodedData?: string,
 *         ...,
 *     },
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminSetUserMFAPreference(array $args = [])
 * @phpstan-method \Aws\Result adminSetUserMFAPreference(array{
 *     SMSMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     SoftwareTokenMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     EmailMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     WebAuthnMfaSettings?: array{Enabled?: bool, ...},
 *     Username?: string,
 *     UserPoolId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminSetUserMFAPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminSetUserMFAPreferenceAsync(array{
 *     SMSMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     SoftwareTokenMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     EmailMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     WebAuthnMfaSettings?: array{Enabled?: bool, ...},
 *     Username?: string,
 *     UserPoolId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminSetUserPassword(array $args = [])
 * @phpstan-method \Aws\Result adminSetUserPassword(array{UserPoolId?: string, Username?: string, Password?: string, Permanent?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminSetUserPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminSetUserPasswordAsync(array{UserPoolId?: string, Username?: string, Password?: string, Permanent?: bool, ...} $args = [])
 * @method \Aws\Result adminSetUserSettings(array $args = [])
 * @phpstan-method \Aws\Result adminSetUserSettings(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     MFAOptions?: list<array{DeliveryMedium?: 'EMAIL'|'SMS', AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminSetUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminSetUserSettingsAsync(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     MFAOptions?: list<array{DeliveryMedium?: 'EMAIL'|'SMS', AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminUpdateAuthEventFeedback(array $args = [])
 * @phpstan-method \Aws\Result adminUpdateAuthEventFeedback(array{UserPoolId?: string, Username?: string, EventId?: string, FeedbackValue?: 'Invalid'|'Valid', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminUpdateAuthEventFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminUpdateAuthEventFeedbackAsync(array{UserPoolId?: string, Username?: string, EventId?: string, FeedbackValue?: 'Invalid'|'Valid', ...} $args = [])
 * @method \Aws\Result adminUpdateDeviceStatus(array $args = [])
 * @phpstan-method \Aws\Result adminUpdateDeviceStatus(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     DeviceKey?: string,
 *     DeviceRememberedStatus?: 'not_remembered'|'remembered',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminUpdateDeviceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminUpdateDeviceStatusAsync(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     DeviceKey?: string,
 *     DeviceRememberedStatus?: 'not_remembered'|'remembered',
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminUpdateUserAttributes(array $args = [])
 * @phpstan-method \Aws\Result adminUpdateUserAttributes(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise adminUpdateUserAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminUpdateUserAttributesAsync(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result adminUserGlobalSignOut(array $args = [])
 * @phpstan-method \Aws\Result adminUserGlobalSignOut(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise adminUserGlobalSignOutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise adminUserGlobalSignOutAsync(array{UserPoolId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result associateSoftwareToken(array $args = [])
 * @phpstan-method \Aws\Result associateSoftwareToken(array{AccessToken?: string, Session?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSoftwareTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSoftwareTokenAsync(array{AccessToken?: string, Session?: string, ...} $args = [])
 * @method \Aws\Result changePassword(array $args = [])
 * @phpstan-method \Aws\Result changePassword(array{PreviousPassword?: string, ProposedPassword?: string, AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise changePasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changePasswordAsync(array{PreviousPassword?: string, ProposedPassword?: string, AccessToken?: string, ...} $args = [])
 * @method \Aws\Result completeWebAuthnRegistration(array $args = [])
 * @phpstan-method \Aws\Result completeWebAuthnRegistration(array{AccessToken?: string, Credential?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeWebAuthnRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeWebAuthnRegistrationAsync(array{AccessToken?: string, Credential?: array, ...} $args = [])
 * @method \Aws\Result confirmDevice(array $args = [])
 * @phpstan-method \Aws\Result confirmDevice(array{
 *     AccessToken?: string,
 *     DeviceKey?: string,
 *     DeviceSecretVerifierConfig?: array{PasswordVerifier?: string, Salt?: string, ...},
 *     DeviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmDeviceAsync(array{
 *     AccessToken?: string,
 *     DeviceKey?: string,
 *     DeviceSecretVerifierConfig?: array{PasswordVerifier?: string, Salt?: string, ...},
 *     DeviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result confirmForgotPassword(array $args = [])
 * @phpstan-method \Aws\Result confirmForgotPassword(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     ConfirmationCode?: string,
 *     Password?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmForgotPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmForgotPasswordAsync(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     ConfirmationCode?: string,
 *     Password?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result confirmSignUp(array $args = [])
 * @phpstan-method \Aws\Result confirmSignUp(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     ConfirmationCode?: string,
 *     ForceAliasCreation?: bool,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmSignUpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmSignUpAsync(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     ConfirmationCode?: string,
 *     ForceAliasCreation?: bool,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{GroupName?: string, UserPoolId?: string, Description?: string, RoleArn?: string, Precedence?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{GroupName?: string, UserPoolId?: string, Description?: string, RoleArn?: string, Precedence?: int, ...} $args = [])
 * @method \Aws\Result createIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result createIdentityProvider(array{
 *     UserPoolId?: string,
 *     ProviderName?: string,
 *     ProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     ProviderDetails?: array<string, string>,
 *     AttributeMapping?: array<string, string>,
 *     IdpIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentityProviderAsync(array{
 *     UserPoolId?: string,
 *     ProviderName?: string,
 *     ProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     ProviderDetails?: array<string, string>,
 *     AttributeMapping?: array<string, string>,
 *     IdpIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createManagedLoginBranding(array $args = [])
 * @phpstan-method \Aws\Result createManagedLoginBranding(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     UseCognitoProvidedValues?: bool,
 *     Settings?: array,
 *     Assets?: list<array{
 *         Category?: 'AUTH_APP_GRAPHIC'|'EMAIL_GRAPHIC'|'FAVICON_ICO'|'FAVICON_SVG'|'FORM_BACKGROUND'|'FORM_LOGO'|'IDP_BUTTON_ICON'|'PAGE_BACKGROUND'|'PAGE_FOOTER_BACKGROUND'|'PAGE_FOOTER_LOGO'|'PAGE_HEADER_BACKGROUND'|'PAGE_HEADER_LOGO'|'PASSKEY_GRAPHIC'|'PASSWORD_GRAPHIC'|'SMS_GRAPHIC',
 *         ColorMode?: 'DARK'|'DYNAMIC'|'LIGHT',
 *         Extension?: 'ICO'|'JPEG'|'PNG'|'SVG'|'WEBP',
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ResourceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createManagedLoginBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createManagedLoginBrandingAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     UseCognitoProvidedValues?: bool,
 *     Settings?: array,
 *     Assets?: list<array{
 *         Category?: 'AUTH_APP_GRAPHIC'|'EMAIL_GRAPHIC'|'FAVICON_ICO'|'FAVICON_SVG'|'FORM_BACKGROUND'|'FORM_LOGO'|'IDP_BUTTON_ICON'|'PAGE_BACKGROUND'|'PAGE_FOOTER_BACKGROUND'|'PAGE_FOOTER_LOGO'|'PAGE_HEADER_BACKGROUND'|'PAGE_HEADER_LOGO'|'PASSKEY_GRAPHIC'|'PASSWORD_GRAPHIC'|'SMS_GRAPHIC',
 *         ColorMode?: 'DARK'|'DYNAMIC'|'LIGHT',
 *         Extension?: 'ICO'|'JPEG'|'PNG'|'SVG'|'WEBP',
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ResourceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceServer(array $args = [])
 * @phpstan-method \Aws\Result createResourceServer(array{
 *     UserPoolId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Scopes?: list<array{ScopeName?: string, ScopeDescription?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceServerAsync(array{
 *     UserPoolId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Scopes?: list<array{ScopeName?: string, ScopeDescription?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTerms(array $args = [])
 * @phpstan-method \Aws\Result createTerms(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     TermsName?: string,
 *     TermsSource?: 'LINK',
 *     Enforcement?: 'NONE',
 *     Links?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTermsAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     TermsName?: string,
 *     TermsSource?: 'LINK',
 *     Enforcement?: 'NONE',
 *     Links?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserImportJob(array $args = [])
 * @phpstan-method \Aws\Result createUserImportJob(array{
 *     JobName?: string,
 *     UserPoolId?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     PasswordHashingAlgorithm?: 'ARGON2ID'|'BCRYPT'|'PBKDF2_SHA256'|'SCRYPT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserImportJobAsync(array{
 *     JobName?: string,
 *     UserPoolId?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     PasswordHashingAlgorithm?: 'ARGON2ID'|'BCRYPT'|'PBKDF2_SHA256'|'SCRYPT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserPool(array $args = [])
 * @phpstan-method \Aws\Result createUserPool(array{
 *     PoolName?: string,
 *     Policies?: array{
 *         PasswordPolicy?: array{
 *             MinimumLength?: int,
 *             RequireUppercase?: bool,
 *             RequireLowercase?: bool,
 *             RequireNumbers?: bool,
 *             RequireSymbols?: bool,
 *             PasswordHistorySize?: int,
 *             TemporaryPasswordValidityDays?: int,
 *             ...,
 *         },
 *         SignInPolicy?: array{AllowedFirstAuthFactors?: list<'EMAIL_OTP'|'PASSWORD'|'SMS_OTP'|'SOFTWARE_TOKEN'|'WEB_AUTHN'>, ...},
 *         ...,
 *     },
 *     DeletionProtection?: 'ACTIVE'|'INACTIVE',
 *     LambdaConfig?: array{
 *         PreSignUp?: string,
 *         CustomMessage?: string,
 *         PostConfirmation?: string,
 *         PreAuthentication?: string,
 *         PostAuthentication?: string,
 *         DefineAuthChallenge?: string,
 *         CreateAuthChallenge?: string,
 *         VerifyAuthChallengeResponse?: string,
 *         PreTokenGeneration?: string,
 *         UserMigration?: string,
 *         PreTokenGenerationConfig?: array{LambdaVersion?: 'V1_0'|'V2_0'|'V3_0', LambdaArn?: string, ...},
 *         CustomSMSSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         CustomEmailSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         KMSKeyID?: string,
 *         InboundFederation?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         ...,
 *     },
 *     AutoVerifiedAttributes?: list<'email'|'phone_number'>,
 *     AliasAttributes?: list<'email'|'phone_number'|'preferred_username'>,
 *     UsernameAttributes?: list<'email'|'phone_number'>,
 *     SmsVerificationMessage?: string,
 *     EmailVerificationMessage?: string,
 *     EmailVerificationSubject?: string,
 *     VerificationMessageTemplate?: array{
 *         SmsMessage?: string,
 *         EmailMessage?: string,
 *         EmailSubject?: string,
 *         EmailMessageByLink?: string,
 *         EmailSubjectByLink?: string,
 *         DefaultEmailOption?: 'CONFIRM_WITH_CODE'|'CONFIRM_WITH_LINK',
 *         ...,
 *     },
 *     SmsAuthenticationMessage?: string,
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     UserAttributeUpdateSettings?: array{AttributesRequireVerificationBeforeUpdate?: list<'email'|'phone_number'>, ...},
 *     DeviceConfiguration?: array{ChallengeRequiredOnNewDevice?: bool, DeviceOnlyRememberedOnUserPrompt?: bool, ...},
 *     EmailConfiguration?: array{
 *         SourceArn?: string,
 *         ReplyToEmailAddress?: string,
 *         EmailSendingAccount?: 'COGNITO_DEFAULT'|'DEVELOPER',
 *         From?: string,
 *         ConfigurationSet?: string,
 *         ...,
 *     },
 *     SmsConfiguration?: array{
 *         SnsCallerArn?: string,
 *         ExternalId?: string,
 *         SnsRegion?: string,
 *         EumsSms?: array{
 *             CallerArn?: string,
 *             ExternalId?: string,
 *             OriginationIdentity?: string,
 *             ConfigurationSetName?: string,
 *             InEntityId?: string,
 *             InTemplateId?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     UserPoolTags?: array<string, string>,
 *     AdminCreateUserConfig?: array{
 *         AllowAdminCreateUserOnly?: bool,
 *         UnusedAccountValidityDays?: int,
 *         InviteMessageTemplate?: array{SMSMessage?: string, EmailMessage?: string, EmailSubject?: string, ...},
 *         ...,
 *     },
 *     Schema?: list<array{
 *         Name?: string,
 *         AttributeDataType?: 'Boolean'|'DateTime'|'Number'|'String',
 *         DeveloperOnlyAttribute?: bool,
 *         Mutable?: bool,
 *         Required?: bool,
 *         NumberAttributeConstraints?: array,
 *         StringAttributeConstraints?: array,
 *         ...,
 *     }>,
 *     UserPoolAddOns?: array{
 *         AdvancedSecurityMode?: 'AUDIT'|'ENFORCED'|'OFF',
 *         AdvancedSecurityAdditionalFlows?: array{CustomAuthMode?: 'AUDIT'|'ENFORCED', ...},
 *         ...,
 *     },
 *     UsernameConfiguration?: array{CaseSensitive?: bool, ...},
 *     AccountRecoverySetting?: array{RecoveryMechanisms?: list<array>, ...},
 *     UserPoolTier?: 'ESSENTIALS'|'LITE'|'PLUS',
 *     KeyConfiguration?: array{KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     IssuerConfiguration?: array{Type?: 'ORIGINAL'|'UPDATED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserPoolAsync(array{
 *     PoolName?: string,
 *     Policies?: array{
 *         PasswordPolicy?: array{
 *             MinimumLength?: int,
 *             RequireUppercase?: bool,
 *             RequireLowercase?: bool,
 *             RequireNumbers?: bool,
 *             RequireSymbols?: bool,
 *             PasswordHistorySize?: int,
 *             TemporaryPasswordValidityDays?: int,
 *             ...,
 *         },
 *         SignInPolicy?: array{AllowedFirstAuthFactors?: list<'EMAIL_OTP'|'PASSWORD'|'SMS_OTP'|'SOFTWARE_TOKEN'|'WEB_AUTHN'>, ...},
 *         ...,
 *     },
 *     DeletionProtection?: 'ACTIVE'|'INACTIVE',
 *     LambdaConfig?: array{
 *         PreSignUp?: string,
 *         CustomMessage?: string,
 *         PostConfirmation?: string,
 *         PreAuthentication?: string,
 *         PostAuthentication?: string,
 *         DefineAuthChallenge?: string,
 *         CreateAuthChallenge?: string,
 *         VerifyAuthChallengeResponse?: string,
 *         PreTokenGeneration?: string,
 *         UserMigration?: string,
 *         PreTokenGenerationConfig?: array{LambdaVersion?: 'V1_0'|'V2_0'|'V3_0', LambdaArn?: string, ...},
 *         CustomSMSSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         CustomEmailSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         KMSKeyID?: string,
 *         InboundFederation?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         ...,
 *     },
 *     AutoVerifiedAttributes?: list<'email'|'phone_number'>,
 *     AliasAttributes?: list<'email'|'phone_number'|'preferred_username'>,
 *     UsernameAttributes?: list<'email'|'phone_number'>,
 *     SmsVerificationMessage?: string,
 *     EmailVerificationMessage?: string,
 *     EmailVerificationSubject?: string,
 *     VerificationMessageTemplate?: array{
 *         SmsMessage?: string,
 *         EmailMessage?: string,
 *         EmailSubject?: string,
 *         EmailMessageByLink?: string,
 *         EmailSubjectByLink?: string,
 *         DefaultEmailOption?: 'CONFIRM_WITH_CODE'|'CONFIRM_WITH_LINK',
 *         ...,
 *     },
 *     SmsAuthenticationMessage?: string,
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     UserAttributeUpdateSettings?: array{AttributesRequireVerificationBeforeUpdate?: list<'email'|'phone_number'>, ...},
 *     DeviceConfiguration?: array{ChallengeRequiredOnNewDevice?: bool, DeviceOnlyRememberedOnUserPrompt?: bool, ...},
 *     EmailConfiguration?: array{
 *         SourceArn?: string,
 *         ReplyToEmailAddress?: string,
 *         EmailSendingAccount?: 'COGNITO_DEFAULT'|'DEVELOPER',
 *         From?: string,
 *         ConfigurationSet?: string,
 *         ...,
 *     },
 *     SmsConfiguration?: array{
 *         SnsCallerArn?: string,
 *         ExternalId?: string,
 *         SnsRegion?: string,
 *         EumsSms?: array{
 *             CallerArn?: string,
 *             ExternalId?: string,
 *             OriginationIdentity?: string,
 *             ConfigurationSetName?: string,
 *             InEntityId?: string,
 *             InTemplateId?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     UserPoolTags?: array<string, string>,
 *     AdminCreateUserConfig?: array{
 *         AllowAdminCreateUserOnly?: bool,
 *         UnusedAccountValidityDays?: int,
 *         InviteMessageTemplate?: array{SMSMessage?: string, EmailMessage?: string, EmailSubject?: string, ...},
 *         ...,
 *     },
 *     Schema?: list<array{
 *         Name?: string,
 *         AttributeDataType?: 'Boolean'|'DateTime'|'Number'|'String',
 *         DeveloperOnlyAttribute?: bool,
 *         Mutable?: bool,
 *         Required?: bool,
 *         NumberAttributeConstraints?: array,
 *         StringAttributeConstraints?: array,
 *         ...,
 *     }>,
 *     UserPoolAddOns?: array{
 *         AdvancedSecurityMode?: 'AUDIT'|'ENFORCED'|'OFF',
 *         AdvancedSecurityAdditionalFlows?: array{CustomAuthMode?: 'AUDIT'|'ENFORCED', ...},
 *         ...,
 *     },
 *     UsernameConfiguration?: array{CaseSensitive?: bool, ...},
 *     AccountRecoverySetting?: array{RecoveryMechanisms?: list<array>, ...},
 *     UserPoolTier?: 'ESSENTIALS'|'LITE'|'PLUS',
 *     KeyConfiguration?: array{KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     IssuerConfiguration?: array{Type?: 'ORIGINAL'|'UPDATED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserPoolClient(array $args = [])
 * @phpstan-method \Aws\Result createUserPoolClient(array{
 *     UserPoolId?: string,
 *     ClientName?: string,
 *     GenerateSecret?: bool,
 *     ClientSecret?: string,
 *     RefreshTokenValidity?: int,
 *     AccessTokenValidity?: int,
 *     IdTokenValidity?: int,
 *     TokenValidityUnits?: array{
 *         AccessToken?: 'days'|'hours'|'minutes'|'seconds',
 *         IdToken?: 'days'|'hours'|'minutes'|'seconds',
 *         RefreshToken?: 'days'|'hours'|'minutes'|'seconds',
 *         ...,
 *     },
 *     ReadAttributes?: list<string>,
 *     WriteAttributes?: list<string>,
 *     ExplicitAuthFlows?: list<'ADMIN_NO_SRP_AUTH'|'ALLOW_ADMIN_USER_PASSWORD_AUTH'|'ALLOW_CUSTOM_AUTH'|'ALLOW_REFRESH_TOKEN_AUTH'|'ALLOW_USER_AUTH'|'ALLOW_USER_PASSWORD_AUTH'|'ALLOW_USER_SRP_AUTH'|'CUSTOM_AUTH_FLOW_ONLY'|'USER_PASSWORD_AUTH'>,
 *     SupportedIdentityProviders?: list<string>,
 *     CallbackURLs?: list<string>,
 *     LogoutURLs?: list<string>,
 *     DefaultRedirectURI?: string,
 *     AllowedOAuthFlows?: list<'client_credentials'|'code'|'implicit'>,
 *     AllowedOAuthScopes?: list<string>,
 *     AllowedOAuthFlowsUserPoolClient?: bool,
 *     AnalyticsConfiguration?: array{
 *         ApplicationId?: string,
 *         ApplicationArn?: string,
 *         RoleArn?: string,
 *         ExternalId?: string,
 *         UserDataShared?: bool,
 *         ...,
 *     },
 *     PreventUserExistenceErrors?: 'ENABLED'|'LEGACY',
 *     EnableTokenRevocation?: bool,
 *     EnablePropagateAdditionalUserContextData?: bool,
 *     AuthSessionValidity?: int,
 *     RefreshTokenRotation?: array{Feature?: 'DISABLED'|'ENABLED', RetryGracePeriodSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserPoolClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserPoolClientAsync(array{
 *     UserPoolId?: string,
 *     ClientName?: string,
 *     GenerateSecret?: bool,
 *     ClientSecret?: string,
 *     RefreshTokenValidity?: int,
 *     AccessTokenValidity?: int,
 *     IdTokenValidity?: int,
 *     TokenValidityUnits?: array{
 *         AccessToken?: 'days'|'hours'|'minutes'|'seconds',
 *         IdToken?: 'days'|'hours'|'minutes'|'seconds',
 *         RefreshToken?: 'days'|'hours'|'minutes'|'seconds',
 *         ...,
 *     },
 *     ReadAttributes?: list<string>,
 *     WriteAttributes?: list<string>,
 *     ExplicitAuthFlows?: list<'ADMIN_NO_SRP_AUTH'|'ALLOW_ADMIN_USER_PASSWORD_AUTH'|'ALLOW_CUSTOM_AUTH'|'ALLOW_REFRESH_TOKEN_AUTH'|'ALLOW_USER_AUTH'|'ALLOW_USER_PASSWORD_AUTH'|'ALLOW_USER_SRP_AUTH'|'CUSTOM_AUTH_FLOW_ONLY'|'USER_PASSWORD_AUTH'>,
 *     SupportedIdentityProviders?: list<string>,
 *     CallbackURLs?: list<string>,
 *     LogoutURLs?: list<string>,
 *     DefaultRedirectURI?: string,
 *     AllowedOAuthFlows?: list<'client_credentials'|'code'|'implicit'>,
 *     AllowedOAuthScopes?: list<string>,
 *     AllowedOAuthFlowsUserPoolClient?: bool,
 *     AnalyticsConfiguration?: array{
 *         ApplicationId?: string,
 *         ApplicationArn?: string,
 *         RoleArn?: string,
 *         ExternalId?: string,
 *         UserDataShared?: bool,
 *         ...,
 *     },
 *     PreventUserExistenceErrors?: 'ENABLED'|'LEGACY',
 *     EnableTokenRevocation?: bool,
 *     EnablePropagateAdditionalUserContextData?: bool,
 *     AuthSessionValidity?: int,
 *     RefreshTokenRotation?: array{Feature?: 'DISABLED'|'ENABLED', RetryGracePeriodSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserPoolDomain(array $args = [])
 * @phpstan-method \Aws\Result createUserPoolDomain(array{
 *     Domain?: string,
 *     UserPoolId?: string,
 *     ManagedLoginVersion?: int,
 *     CustomDomainConfig?: array{CertificateArn?: string, SecurityPolicy?: 'TLS_V1'|'TLS_V1_2_2021'|'TLS_V1_3_2025', ...},
 *     Routing?: array{Failover?: array{SecondaryRegion?: string, PrimaryRoute53HealthCheckId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserPoolDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserPoolDomainAsync(array{
 *     Domain?: string,
 *     UserPoolId?: string,
 *     ManagedLoginVersion?: int,
 *     CustomDomainConfig?: array{CertificateArn?: string, SecurityPolicy?: 'TLS_V1'|'TLS_V1_2_2021'|'TLS_V1_3_2025', ...},
 *     Routing?: array{Failover?: array{SecondaryRegion?: string, PrimaryRoute53HealthCheckId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserPoolReplica(array $args = [])
 * @phpstan-method \Aws\Result createUserPoolReplica(array{UserPoolId?: string, RegionName?: string, UserPoolTags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserPoolReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserPoolReplicaAsync(array{UserPoolId?: string, RegionName?: string, UserPoolTags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupName?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupName?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityProvider(array{UserPoolId?: string, ProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityProviderAsync(array{UserPoolId?: string, ProviderName?: string, ...} $args = [])
 * @method \Aws\Result deleteManagedLoginBranding(array $args = [])
 * @phpstan-method \Aws\Result deleteManagedLoginBranding(array{ManagedLoginBrandingId?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteManagedLoginBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteManagedLoginBrandingAsync(array{ManagedLoginBrandingId?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceServer(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceServer(array{UserPoolId?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceServerAsync(array{UserPoolId?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTerms(array $args = [])
 * @phpstan-method \Aws\Result deleteTerms(array{TermsId?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTermsAsync(array{TermsId?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{AccessToken?: string, ...} $args = [])
 * @method \Aws\Result deleteUserAttributes(array $args = [])
 * @phpstan-method \Aws\Result deleteUserAttributes(array{UserAttributeNames?: list<string>, AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAttributesAsync(array{UserAttributeNames?: list<string>, AccessToken?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPool(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPool(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPoolAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPoolClient(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPoolClient(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPoolClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPoolClientAsync(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPoolClientSecret(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPoolClientSecret(array{UserPoolId?: string, ClientId?: string, ClientSecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPoolClientSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPoolClientSecretAsync(array{UserPoolId?: string, ClientId?: string, ClientSecretId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPoolDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPoolDomain(array{Domain?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPoolDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPoolDomainAsync(array{Domain?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserPoolReplica(array $args = [])
 * @phpstan-method \Aws\Result deleteUserPoolReplica(array{UserPoolId?: string, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPoolReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserPoolReplicaAsync(array{UserPoolId?: string, RegionName?: string, ...} $args = [])
 * @method \Aws\Result deleteWebAuthnCredential(array $args = [])
 * @phpstan-method \Aws\Result deleteWebAuthnCredential(array{AccessToken?: string, CredentialId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebAuthnCredentialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebAuthnCredentialAsync(array{AccessToken?: string, CredentialId?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityProvider(array{UserPoolId?: string, ProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityProviderAsync(array{UserPoolId?: string, ProviderName?: string, ...} $args = [])
 * @method \Aws\Result describeManagedLoginBranding(array $args = [])
 * @phpstan-method \Aws\Result describeManagedLoginBranding(array{UserPoolId?: string, ManagedLoginBrandingId?: string, ReturnMergedResources?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedLoginBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedLoginBrandingAsync(array{UserPoolId?: string, ManagedLoginBrandingId?: string, ReturnMergedResources?: bool, ...} $args = [])
 * @method \Aws\Result describeManagedLoginBrandingByClient(array $args = [])
 * @phpstan-method \Aws\Result describeManagedLoginBrandingByClient(array{UserPoolId?: string, ClientId?: string, ReturnMergedResources?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedLoginBrandingByClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedLoginBrandingByClientAsync(array{UserPoolId?: string, ClientId?: string, ReturnMergedResources?: bool, ...} $args = [])
 * @method \Aws\Result describeResourceServer(array $args = [])
 * @phpstan-method \Aws\Result describeResourceServer(array{UserPoolId?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceServerAsync(array{UserPoolId?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result describeRiskConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeRiskConfiguration(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRiskConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRiskConfigurationAsync(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \Aws\Result describeTerms(array $args = [])
 * @phpstan-method \Aws\Result describeTerms(array{TermsId?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTermsAsync(array{TermsId?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result describeUserImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeUserImportJob(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserImportJobAsync(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result describeUserPool(array $args = [])
 * @phpstan-method \Aws\Result describeUserPool(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserPoolAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result describeUserPoolClient(array $args = [])
 * @phpstan-method \Aws\Result describeUserPoolClient(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserPoolClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserPoolClientAsync(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \Aws\Result describeUserPoolDomain(array $args = [])
 * @phpstan-method \Aws\Result describeUserPoolDomain(array{Domain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserPoolDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserPoolDomainAsync(array{Domain?: string, ...} $args = [])
 * @method \Aws\Result forgetDevice(array $args = [])
 * @phpstan-method \Aws\Result forgetDevice(array{AccessToken?: string, DeviceKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise forgetDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise forgetDeviceAsync(array{AccessToken?: string, DeviceKey?: string, ...} $args = [])
 * @method \Aws\Result forgotPassword(array $args = [])
 * @phpstan-method \Aws\Result forgotPassword(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Username?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise forgotPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise forgotPasswordAsync(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Username?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCSVHeader(array $args = [])
 * @phpstan-method \Aws\Result getCSVHeader(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCSVHeaderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCSVHeaderAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result getDevice(array $args = [])
 * @phpstan-method \Aws\Result getDevice(array{DeviceKey?: string, AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceAsync(array{DeviceKey?: string, AccessToken?: string, ...} $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupName?: string, UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupName?: string, UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result getIdentityProviderByIdentifier(array $args = [])
 * @phpstan-method \Aws\Result getIdentityProviderByIdentifier(array{UserPoolId?: string, IdpIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityProviderByIdentifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityProviderByIdentifierAsync(array{UserPoolId?: string, IdpIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getLogDeliveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLogDeliveryConfiguration(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogDeliveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogDeliveryConfigurationAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result getProvisionedLimit(array $args = [])
 * @phpstan-method \Aws\Result getProvisionedLimit(array{LimitDefinition?: array{LimitClass?: 'API_CATEGORY', Attributes?: array<string, string>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProvisionedLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProvisionedLimitAsync(array{LimitDefinition?: array{LimitClass?: 'API_CATEGORY', Attributes?: array<string, string>, ...}, ...} $args = [])
 * @method \Aws\Result getSigningCertificate(array $args = [])
 * @phpstan-method \Aws\Result getSigningCertificate(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSigningCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSigningCertificateAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result getTokensFromRefreshToken(array $args = [])
 * @phpstan-method \Aws\Result getTokensFromRefreshToken(array{
 *     RefreshToken?: string,
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     DeviceKey?: string,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTokensFromRefreshTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTokensFromRefreshTokenAsync(array{
 *     RefreshToken?: string,
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     DeviceKey?: string,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUICustomization(array $args = [])
 * @phpstan-method \Aws\Result getUICustomization(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUICustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUICustomizationAsync(array{UserPoolId?: string, ClientId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{AccessToken?: string, ...} $args = [])
 * @method \Aws\Result getUserAttributeVerificationCode(array $args = [])
 * @phpstan-method \Aws\Result getUserAttributeVerificationCode(array{AccessToken?: string, AttributeName?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAttributeVerificationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAttributeVerificationCodeAsync(array{AccessToken?: string, AttributeName?: string, ClientMetadata?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getUserAuthFactors(array $args = [])
 * @phpstan-method \Aws\Result getUserAuthFactors(array{AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAuthFactorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAuthFactorsAsync(array{AccessToken?: string, ...} $args = [])
 * @method \Aws\Result getUserPoolMfaConfig(array $args = [])
 * @phpstan-method \Aws\Result getUserPoolMfaConfig(array{UserPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserPoolMfaConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserPoolMfaConfigAsync(array{UserPoolId?: string, ...} $args = [])
 * @method \Aws\Result globalSignOut(array $args = [])
 * @phpstan-method \Aws\Result globalSignOut(array{AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise globalSignOutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise globalSignOutAsync(array{AccessToken?: string, ...} $args = [])
 * @method \Aws\Result initiateAuth(array $args = [])
 * @phpstan-method \Aws\Result initiateAuth(array{
 *     AuthFlow?: 'ADMIN_NO_SRP_AUTH'|'ADMIN_USER_PASSWORD_AUTH'|'CUSTOM_AUTH'|'REFRESH_TOKEN'|'REFRESH_TOKEN_AUTH'|'USER_AUTH'|'USER_PASSWORD_AUTH'|'USER_SRP_AUTH',
 *     AuthParameters?: array<string, string>,
 *     ClientMetadata?: array<string, string>,
 *     ClientId?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateAuthAsync(array{
 *     AuthFlow?: 'ADMIN_NO_SRP_AUTH'|'ADMIN_USER_PASSWORD_AUTH'|'CUSTOM_AUTH'|'REFRESH_TOKEN'|'REFRESH_TOKEN_AUTH'|'USER_AUTH'|'USER_PASSWORD_AUTH'|'USER_SRP_AUTH',
 *     AuthParameters?: array<string, string>,
 *     ClientMetadata?: array<string, string>,
 *     ClientId?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Session?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @phpstan-method \Aws\Result listDevices(array{AccessToken?: string, Limit?: int, PaginationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesAsync(array{AccessToken?: string, Limit?: int, PaginationToken?: string, ...} $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{UserPoolId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{UserPoolId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listIdentityProviders(array $args = [])
 * @phpstan-method \Aws\Result listIdentityProviders(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceServers(array $args = [])
 * @phpstan-method \Aws\Result listResourceServers(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceServersAsync(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTerms(array $args = [])
 * @phpstan-method \Aws\Result listTerms(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTermsAsync(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUserImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listUserImportJobs(array{UserPoolId?: string, MaxResults?: int, PaginationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserImportJobsAsync(array{UserPoolId?: string, MaxResults?: int, PaginationToken?: string, ...} $args = [])
 * @method \Aws\Result listUserPoolClientSecrets(array $args = [])
 * @phpstan-method \Aws\Result listUserPoolClientSecrets(array{UserPoolId?: string, ClientId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoolClientSecretsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserPoolClientSecretsAsync(array{UserPoolId?: string, ClientId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUserPoolClients(array $args = [])
 * @phpstan-method \Aws\Result listUserPoolClients(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoolClientsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserPoolClientsAsync(array{UserPoolId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUserPoolReplicas(array $args = [])
 * @phpstan-method \Aws\Result listUserPoolReplicas(array{UserPoolId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoolReplicasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserPoolReplicasAsync(array{UserPoolId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUserPools(array $args = [])
 * @phpstan-method \Aws\Result listUserPools(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserPoolsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{
 *     UserPoolId?: string,
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     PaginationToken?: string,
 *     Filter?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{
 *     UserPoolId?: string,
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     PaginationToken?: string,
 *     Filter?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUsersInGroup(array $args = [])
 * @phpstan-method \Aws\Result listUsersInGroup(array{UserPoolId?: string, GroupName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersInGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersInGroupAsync(array{UserPoolId?: string, GroupName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listWebAuthnCredentials(array $args = [])
 * @phpstan-method \Aws\Result listWebAuthnCredentials(array{AccessToken?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebAuthnCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebAuthnCredentialsAsync(array{AccessToken?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result resendConfirmationCode(array $args = [])
 * @phpstan-method \Aws\Result resendConfirmationCode(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Username?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resendConfirmationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resendConfirmationCodeAsync(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     Username?: string,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result respondToAuthChallenge(array $args = [])
 * @phpstan-method \Aws\Result respondToAuthChallenge(array{
 *     ClientId?: string,
 *     ChallengeName?: 'ADMIN_NO_SRP_AUTH'|'CUSTOM_CHALLENGE'|'DEVICE_PASSWORD_VERIFIER'|'DEVICE_SRP_AUTH'|'EMAIL_OTP'|'MFA_SETUP'|'NEW_PASSWORD_REQUIRED'|'PASSWORD'|'PASSWORD_SRP'|'PASSWORD_VERIFIER'|'SELECT_CHALLENGE'|'SELECT_MFA_TYPE'|'SMS_MFA'|'SMS_OTP'|'SOFTWARE_TOKEN_MFA'|'WEB_AUTHN',
 *     Session?: string,
 *     ChallengeResponses?: array<string, string>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise respondToAuthChallengeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise respondToAuthChallengeAsync(array{
 *     ClientId?: string,
 *     ChallengeName?: 'ADMIN_NO_SRP_AUTH'|'CUSTOM_CHALLENGE'|'DEVICE_PASSWORD_VERIFIER'|'DEVICE_SRP_AUTH'|'EMAIL_OTP'|'MFA_SETUP'|'NEW_PASSWORD_REQUIRED'|'PASSWORD'|'PASSWORD_SRP'|'PASSWORD_VERIFIER'|'SELECT_CHALLENGE'|'SELECT_MFA_TYPE'|'SMS_MFA'|'SMS_OTP'|'SOFTWARE_TOKEN_MFA'|'WEB_AUTHN',
 *     Session?: string,
 *     ChallengeResponses?: array<string, string>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeToken(array $args = [])
 * @phpstan-method \Aws\Result revokeToken(array{Token?: string, ClientId?: string, ClientSecret?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeTokenAsync(array{Token?: string, ClientId?: string, ClientSecret?: string, ...} $args = [])
 * @method \Aws\Result setLogDeliveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result setLogDeliveryConfiguration(array{
 *     UserPoolId?: string,
 *     LogConfigurations?: list<array{
 *         LogLevel?: 'ERROR'|'INFO',
 *         EventSource?: 'userAuthEvents'|'userNotification',
 *         CloudWatchLogsConfiguration?: array,
 *         S3Configuration?: array,
 *         FirehoseConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setLogDeliveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLogDeliveryConfigurationAsync(array{
 *     UserPoolId?: string,
 *     LogConfigurations?: list<array{
 *         LogLevel?: 'ERROR'|'INFO',
 *         EventSource?: 'userAuthEvents'|'userNotification',
 *         CloudWatchLogsConfiguration?: array,
 *         S3Configuration?: array,
 *         FirehoseConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setRiskConfiguration(array $args = [])
 * @phpstan-method \Aws\Result setRiskConfiguration(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     CompromisedCredentialsRiskConfiguration?: array{
 *         EventFilter?: list<'PASSWORD_CHANGE'|'SIGN_IN'|'SIGN_UP'>,
 *         Actions?: array{EventAction?: 'BLOCK'|'NO_ACTION', ...},
 *         ...,
 *     },
 *     AccountTakeoverRiskConfiguration?: array{
 *         NotifyConfiguration?: array{
 *             From?: string,
 *             ReplyTo?: string,
 *             SourceArn?: string,
 *             BlockEmail?: array,
 *             NoActionEmail?: array,
 *             MfaEmail?: array,
 *             ...,
 *         },
 *         Actions?: array{LowAction?: array, MediumAction?: array, HighAction?: array, ...},
 *         ...,
 *     },
 *     RiskExceptionConfiguration?: array{BlockedIPRangeList?: list<string>, SkippedIPRangeList?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setRiskConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setRiskConfigurationAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     CompromisedCredentialsRiskConfiguration?: array{
 *         EventFilter?: list<'PASSWORD_CHANGE'|'SIGN_IN'|'SIGN_UP'>,
 *         Actions?: array{EventAction?: 'BLOCK'|'NO_ACTION', ...},
 *         ...,
 *     },
 *     AccountTakeoverRiskConfiguration?: array{
 *         NotifyConfiguration?: array{
 *             From?: string,
 *             ReplyTo?: string,
 *             SourceArn?: string,
 *             BlockEmail?: array,
 *             NoActionEmail?: array,
 *             MfaEmail?: array,
 *             ...,
 *         },
 *         Actions?: array{LowAction?: array, MediumAction?: array, HighAction?: array, ...},
 *         ...,
 *     },
 *     RiskExceptionConfiguration?: array{BlockedIPRangeList?: list<string>, SkippedIPRangeList?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result setUICustomization(array $args = [])
 * @phpstan-method \Aws\Result setUICustomization(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     CSS?: string,
 *     ImageFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setUICustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setUICustomizationAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     CSS?: string,
 *     ImageFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setUserMFAPreference(array $args = [])
 * @phpstan-method \Aws\Result setUserMFAPreference(array{
 *     SMSMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     SoftwareTokenMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     EmailMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     WebAuthnMfaSettings?: array{Enabled?: bool, ...},
 *     AccessToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setUserMFAPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setUserMFAPreferenceAsync(array{
 *     SMSMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     SoftwareTokenMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     EmailMfaSettings?: array{Enabled?: bool, PreferredMfa?: bool, ...},
 *     WebAuthnMfaSettings?: array{Enabled?: bool, ...},
 *     AccessToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setUserPoolMfaConfig(array $args = [])
 * @phpstan-method \Aws\Result setUserPoolMfaConfig(array{
 *     UserPoolId?: string,
 *     SmsMfaConfiguration?: array{
 *         SmsAuthenticationMessage?: string,
 *         SmsConfiguration?: array{SnsCallerArn?: string, ExternalId?: string, SnsRegion?: string, EumsSms?: array, ...},
 *         ...,
 *     },
 *     SoftwareTokenMfaConfiguration?: array{Enabled?: bool, ...},
 *     EmailMfaConfiguration?: array{Message?: string, Subject?: string, ...},
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     WebAuthnConfiguration?: array{
 *         RelyingPartyId?: string,
 *         UserVerification?: 'preferred'|'required',
 *         FactorConfiguration?: 'MULTI_FACTOR_WITH_USER_VERIFICATION'|'SINGLE_FACTOR',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setUserPoolMfaConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setUserPoolMfaConfigAsync(array{
 *     UserPoolId?: string,
 *     SmsMfaConfiguration?: array{
 *         SmsAuthenticationMessage?: string,
 *         SmsConfiguration?: array{SnsCallerArn?: string, ExternalId?: string, SnsRegion?: string, EumsSms?: array, ...},
 *         ...,
 *     },
 *     SoftwareTokenMfaConfiguration?: array{Enabled?: bool, ...},
 *     EmailMfaConfiguration?: array{Message?: string, Subject?: string, ...},
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     WebAuthnConfiguration?: array{
 *         RelyingPartyId?: string,
 *         UserVerification?: 'preferred'|'required',
 *         FactorConfiguration?: 'MULTI_FACTOR_WITH_USER_VERIFICATION'|'SINGLE_FACTOR',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result setUserSettings(array $args = [])
 * @phpstan-method \Aws\Result setUserSettings(array{
 *     AccessToken?: string,
 *     MFAOptions?: list<array{DeliveryMedium?: 'EMAIL'|'SMS', AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setUserSettingsAsync(array{
 *     AccessToken?: string,
 *     MFAOptions?: list<array{DeliveryMedium?: 'EMAIL'|'SMS', AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result signUp(array $args = [])
 * @phpstan-method \Aws\Result signUp(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     Password?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ValidationData?: list<array{Name?: string, Value?: string, ...}>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise signUpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise signUpAsync(array{
 *     ClientId?: string,
 *     SecretHash?: string,
 *     Username?: string,
 *     Password?: string,
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ValidationData?: list<array{Name?: string, Value?: string, ...}>,
 *     AnalyticsMetadata?: array{AnalyticsEndpointId?: string, ...},
 *     UserContextData?: array{IpAddress?: string, EncodedData?: string, ...},
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startUserImportJob(array $args = [])
 * @phpstan-method \Aws\Result startUserImportJob(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startUserImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startUserImportJobAsync(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result startWebAuthnRegistration(array $args = [])
 * @phpstan-method \Aws\Result startWebAuthnRegistration(array{AccessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWebAuthnRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWebAuthnRegistrationAsync(array{AccessToken?: string, ...} $args = [])
 * @method \Aws\Result stopUserImportJob(array $args = [])
 * @phpstan-method \Aws\Result stopUserImportJob(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopUserImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopUserImportJobAsync(array{UserPoolId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAuthEventFeedback(array $args = [])
 * @phpstan-method \Aws\Result updateAuthEventFeedback(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     EventId?: string,
 *     FeedbackToken?: string,
 *     FeedbackValue?: 'Invalid'|'Valid',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuthEventFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuthEventFeedbackAsync(array{
 *     UserPoolId?: string,
 *     Username?: string,
 *     EventId?: string,
 *     FeedbackToken?: string,
 *     FeedbackValue?: 'Invalid'|'Valid',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeviceStatus(array $args = [])
 * @phpstan-method \Aws\Result updateDeviceStatus(array{AccessToken?: string, DeviceKey?: string, DeviceRememberedStatus?: 'not_remembered'|'remembered', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceStatusAsync(array{AccessToken?: string, DeviceKey?: string, DeviceRememberedStatus?: 'not_remembered'|'remembered', ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{GroupName?: string, UserPoolId?: string, Description?: string, RoleArn?: string, Precedence?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{GroupName?: string, UserPoolId?: string, Description?: string, RoleArn?: string, Precedence?: int, ...} $args = [])
 * @method \Aws\Result updateIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result updateIdentityProvider(array{
 *     UserPoolId?: string,
 *     ProviderName?: string,
 *     ProviderDetails?: array<string, string>,
 *     AttributeMapping?: array<string, string>,
 *     IdpIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentityProviderAsync(array{
 *     UserPoolId?: string,
 *     ProviderName?: string,
 *     ProviderDetails?: array<string, string>,
 *     AttributeMapping?: array<string, string>,
 *     IdpIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateManagedLoginBranding(array $args = [])
 * @phpstan-method \Aws\Result updateManagedLoginBranding(array{
 *     UserPoolId?: string,
 *     ManagedLoginBrandingId?: string,
 *     UseCognitoProvidedValues?: bool,
 *     Settings?: array,
 *     Assets?: list<array{
 *         Category?: 'AUTH_APP_GRAPHIC'|'EMAIL_GRAPHIC'|'FAVICON_ICO'|'FAVICON_SVG'|'FORM_BACKGROUND'|'FORM_LOGO'|'IDP_BUTTON_ICON'|'PAGE_BACKGROUND'|'PAGE_FOOTER_BACKGROUND'|'PAGE_FOOTER_LOGO'|'PAGE_HEADER_BACKGROUND'|'PAGE_HEADER_LOGO'|'PASSKEY_GRAPHIC'|'PASSWORD_GRAPHIC'|'SMS_GRAPHIC',
 *         ColorMode?: 'DARK'|'DYNAMIC'|'LIGHT',
 *         Extension?: 'ICO'|'JPEG'|'PNG'|'SVG'|'WEBP',
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ResourceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateManagedLoginBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateManagedLoginBrandingAsync(array{
 *     UserPoolId?: string,
 *     ManagedLoginBrandingId?: string,
 *     UseCognitoProvidedValues?: bool,
 *     Settings?: array,
 *     Assets?: list<array{
 *         Category?: 'AUTH_APP_GRAPHIC'|'EMAIL_GRAPHIC'|'FAVICON_ICO'|'FAVICON_SVG'|'FORM_BACKGROUND'|'FORM_LOGO'|'IDP_BUTTON_ICON'|'PAGE_BACKGROUND'|'PAGE_FOOTER_BACKGROUND'|'PAGE_FOOTER_LOGO'|'PAGE_HEADER_BACKGROUND'|'PAGE_HEADER_LOGO'|'PASSKEY_GRAPHIC'|'PASSWORD_GRAPHIC'|'SMS_GRAPHIC',
 *         ColorMode?: 'DARK'|'DYNAMIC'|'LIGHT',
 *         Extension?: 'ICO'|'JPEG'|'PNG'|'SVG'|'WEBP',
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ResourceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisionedLimit(array $args = [])
 * @phpstan-method \Aws\Result updateProvisionedLimit(array{
 *     LimitDefinition?: array{LimitClass?: 'API_CATEGORY', Attributes?: array<string, string>, ...},
 *     RequestedLimitValue?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisionedLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisionedLimitAsync(array{
 *     LimitDefinition?: array{LimitClass?: 'API_CATEGORY', Attributes?: array<string, string>, ...},
 *     RequestedLimitValue?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourceServer(array $args = [])
 * @phpstan-method \Aws\Result updateResourceServer(array{
 *     UserPoolId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Scopes?: list<array{ScopeName?: string, ScopeDescription?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceServerAsync(array{
 *     UserPoolId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Scopes?: list<array{ScopeName?: string, ScopeDescription?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTerms(array $args = [])
 * @phpstan-method \Aws\Result updateTerms(array{
 *     TermsId?: string,
 *     UserPoolId?: string,
 *     TermsName?: string,
 *     TermsSource?: 'LINK',
 *     Enforcement?: 'NONE',
 *     Links?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTermsAsync(array{
 *     TermsId?: string,
 *     UserPoolId?: string,
 *     TermsName?: string,
 *     TermsSource?: 'LINK',
 *     Enforcement?: 'NONE',
 *     Links?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateUserAttributes(array{
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     AccessToken?: string,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAttributesAsync(array{
 *     UserAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     AccessToken?: string,
 *     ClientMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserPool(array $args = [])
 * @phpstan-method \Aws\Result updateUserPool(array{
 *     UserPoolId?: string,
 *     Policies?: array{
 *         PasswordPolicy?: array{
 *             MinimumLength?: int,
 *             RequireUppercase?: bool,
 *             RequireLowercase?: bool,
 *             RequireNumbers?: bool,
 *             RequireSymbols?: bool,
 *             PasswordHistorySize?: int,
 *             TemporaryPasswordValidityDays?: int,
 *             ...,
 *         },
 *         SignInPolicy?: array{AllowedFirstAuthFactors?: list<'EMAIL_OTP'|'PASSWORD'|'SMS_OTP'|'SOFTWARE_TOKEN'|'WEB_AUTHN'>, ...},
 *         ...,
 *     },
 *     DeletionProtection?: 'ACTIVE'|'INACTIVE',
 *     LambdaConfig?: array{
 *         PreSignUp?: string,
 *         CustomMessage?: string,
 *         PostConfirmation?: string,
 *         PreAuthentication?: string,
 *         PostAuthentication?: string,
 *         DefineAuthChallenge?: string,
 *         CreateAuthChallenge?: string,
 *         VerifyAuthChallengeResponse?: string,
 *         PreTokenGeneration?: string,
 *         UserMigration?: string,
 *         PreTokenGenerationConfig?: array{LambdaVersion?: 'V1_0'|'V2_0'|'V3_0', LambdaArn?: string, ...},
 *         CustomSMSSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         CustomEmailSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         KMSKeyID?: string,
 *         InboundFederation?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         ...,
 *     },
 *     AutoVerifiedAttributes?: list<'email'|'phone_number'>,
 *     SmsVerificationMessage?: string,
 *     EmailVerificationMessage?: string,
 *     EmailVerificationSubject?: string,
 *     VerificationMessageTemplate?: array{
 *         SmsMessage?: string,
 *         EmailMessage?: string,
 *         EmailSubject?: string,
 *         EmailMessageByLink?: string,
 *         EmailSubjectByLink?: string,
 *         DefaultEmailOption?: 'CONFIRM_WITH_CODE'|'CONFIRM_WITH_LINK',
 *         ...,
 *     },
 *     SmsAuthenticationMessage?: string,
 *     UserAttributeUpdateSettings?: array{AttributesRequireVerificationBeforeUpdate?: list<'email'|'phone_number'>, ...},
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     DeviceConfiguration?: array{ChallengeRequiredOnNewDevice?: bool, DeviceOnlyRememberedOnUserPrompt?: bool, ...},
 *     EmailConfiguration?: array{
 *         SourceArn?: string,
 *         ReplyToEmailAddress?: string,
 *         EmailSendingAccount?: 'COGNITO_DEFAULT'|'DEVELOPER',
 *         From?: string,
 *         ConfigurationSet?: string,
 *         ...,
 *     },
 *     SmsConfiguration?: array{
 *         SnsCallerArn?: string,
 *         ExternalId?: string,
 *         SnsRegion?: string,
 *         EumsSms?: array{
 *             CallerArn?: string,
 *             ExternalId?: string,
 *             OriginationIdentity?: string,
 *             ConfigurationSetName?: string,
 *             InEntityId?: string,
 *             InTemplateId?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     UserPoolTags?: array<string, string>,
 *     AdminCreateUserConfig?: array{
 *         AllowAdminCreateUserOnly?: bool,
 *         UnusedAccountValidityDays?: int,
 *         InviteMessageTemplate?: array{SMSMessage?: string, EmailMessage?: string, EmailSubject?: string, ...},
 *         ...,
 *     },
 *     UserPoolAddOns?: array{
 *         AdvancedSecurityMode?: 'AUDIT'|'ENFORCED'|'OFF',
 *         AdvancedSecurityAdditionalFlows?: array{CustomAuthMode?: 'AUDIT'|'ENFORCED', ...},
 *         ...,
 *     },
 *     AccountRecoverySetting?: array{RecoveryMechanisms?: list<array>, ...},
 *     PoolName?: string,
 *     UserPoolTier?: 'ESSENTIALS'|'LITE'|'PLUS',
 *     KeyConfiguration?: array{KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     IssuerConfiguration?: array{Type?: 'ORIGINAL'|'UPDATED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserPoolAsync(array{
 *     UserPoolId?: string,
 *     Policies?: array{
 *         PasswordPolicy?: array{
 *             MinimumLength?: int,
 *             RequireUppercase?: bool,
 *             RequireLowercase?: bool,
 *             RequireNumbers?: bool,
 *             RequireSymbols?: bool,
 *             PasswordHistorySize?: int,
 *             TemporaryPasswordValidityDays?: int,
 *             ...,
 *         },
 *         SignInPolicy?: array{AllowedFirstAuthFactors?: list<'EMAIL_OTP'|'PASSWORD'|'SMS_OTP'|'SOFTWARE_TOKEN'|'WEB_AUTHN'>, ...},
 *         ...,
 *     },
 *     DeletionProtection?: 'ACTIVE'|'INACTIVE',
 *     LambdaConfig?: array{
 *         PreSignUp?: string,
 *         CustomMessage?: string,
 *         PostConfirmation?: string,
 *         PreAuthentication?: string,
 *         PostAuthentication?: string,
 *         DefineAuthChallenge?: string,
 *         CreateAuthChallenge?: string,
 *         VerifyAuthChallengeResponse?: string,
 *         PreTokenGeneration?: string,
 *         UserMigration?: string,
 *         PreTokenGenerationConfig?: array{LambdaVersion?: 'V1_0'|'V2_0'|'V3_0', LambdaArn?: string, ...},
 *         CustomSMSSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         CustomEmailSender?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         KMSKeyID?: string,
 *         InboundFederation?: array{LambdaVersion?: 'V1_0', LambdaArn?: string, ...},
 *         ...,
 *     },
 *     AutoVerifiedAttributes?: list<'email'|'phone_number'>,
 *     SmsVerificationMessage?: string,
 *     EmailVerificationMessage?: string,
 *     EmailVerificationSubject?: string,
 *     VerificationMessageTemplate?: array{
 *         SmsMessage?: string,
 *         EmailMessage?: string,
 *         EmailSubject?: string,
 *         EmailMessageByLink?: string,
 *         EmailSubjectByLink?: string,
 *         DefaultEmailOption?: 'CONFIRM_WITH_CODE'|'CONFIRM_WITH_LINK',
 *         ...,
 *     },
 *     SmsAuthenticationMessage?: string,
 *     UserAttributeUpdateSettings?: array{AttributesRequireVerificationBeforeUpdate?: list<'email'|'phone_number'>, ...},
 *     MfaConfiguration?: 'OFF'|'ON'|'OPTIONAL',
 *     DeviceConfiguration?: array{ChallengeRequiredOnNewDevice?: bool, DeviceOnlyRememberedOnUserPrompt?: bool, ...},
 *     EmailConfiguration?: array{
 *         SourceArn?: string,
 *         ReplyToEmailAddress?: string,
 *         EmailSendingAccount?: 'COGNITO_DEFAULT'|'DEVELOPER',
 *         From?: string,
 *         ConfigurationSet?: string,
 *         ...,
 *     },
 *     SmsConfiguration?: array{
 *         SnsCallerArn?: string,
 *         ExternalId?: string,
 *         SnsRegion?: string,
 *         EumsSms?: array{
 *             CallerArn?: string,
 *             ExternalId?: string,
 *             OriginationIdentity?: string,
 *             ConfigurationSetName?: string,
 *             InEntityId?: string,
 *             InTemplateId?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     UserPoolTags?: array<string, string>,
 *     AdminCreateUserConfig?: array{
 *         AllowAdminCreateUserOnly?: bool,
 *         UnusedAccountValidityDays?: int,
 *         InviteMessageTemplate?: array{SMSMessage?: string, EmailMessage?: string, EmailSubject?: string, ...},
 *         ...,
 *     },
 *     UserPoolAddOns?: array{
 *         AdvancedSecurityMode?: 'AUDIT'|'ENFORCED'|'OFF',
 *         AdvancedSecurityAdditionalFlows?: array{CustomAuthMode?: 'AUDIT'|'ENFORCED', ...},
 *         ...,
 *     },
 *     AccountRecoverySetting?: array{RecoveryMechanisms?: list<array>, ...},
 *     PoolName?: string,
 *     UserPoolTier?: 'ESSENTIALS'|'LITE'|'PLUS',
 *     KeyConfiguration?: array{KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyArn?: string, ...},
 *     IssuerConfiguration?: array{Type?: 'ORIGINAL'|'UPDATED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserPoolClient(array $args = [])
 * @phpstan-method \Aws\Result updateUserPoolClient(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     ClientName?: string,
 *     RefreshTokenValidity?: int,
 *     AccessTokenValidity?: int,
 *     IdTokenValidity?: int,
 *     TokenValidityUnits?: array{
 *         AccessToken?: 'days'|'hours'|'minutes'|'seconds',
 *         IdToken?: 'days'|'hours'|'minutes'|'seconds',
 *         RefreshToken?: 'days'|'hours'|'minutes'|'seconds',
 *         ...,
 *     },
 *     ReadAttributes?: list<string>,
 *     WriteAttributes?: list<string>,
 *     ExplicitAuthFlows?: list<'ADMIN_NO_SRP_AUTH'|'ALLOW_ADMIN_USER_PASSWORD_AUTH'|'ALLOW_CUSTOM_AUTH'|'ALLOW_REFRESH_TOKEN_AUTH'|'ALLOW_USER_AUTH'|'ALLOW_USER_PASSWORD_AUTH'|'ALLOW_USER_SRP_AUTH'|'CUSTOM_AUTH_FLOW_ONLY'|'USER_PASSWORD_AUTH'>,
 *     SupportedIdentityProviders?: list<string>,
 *     CallbackURLs?: list<string>,
 *     LogoutURLs?: list<string>,
 *     DefaultRedirectURI?: string,
 *     AllowedOAuthFlows?: list<'client_credentials'|'code'|'implicit'>,
 *     AllowedOAuthScopes?: list<string>,
 *     AllowedOAuthFlowsUserPoolClient?: bool,
 *     AnalyticsConfiguration?: array{
 *         ApplicationId?: string,
 *         ApplicationArn?: string,
 *         RoleArn?: string,
 *         ExternalId?: string,
 *         UserDataShared?: bool,
 *         ...,
 *     },
 *     PreventUserExistenceErrors?: 'ENABLED'|'LEGACY',
 *     EnableTokenRevocation?: bool,
 *     EnablePropagateAdditionalUserContextData?: bool,
 *     AuthSessionValidity?: int,
 *     RefreshTokenRotation?: array{Feature?: 'DISABLED'|'ENABLED', RetryGracePeriodSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPoolClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserPoolClientAsync(array{
 *     UserPoolId?: string,
 *     ClientId?: string,
 *     ClientName?: string,
 *     RefreshTokenValidity?: int,
 *     AccessTokenValidity?: int,
 *     IdTokenValidity?: int,
 *     TokenValidityUnits?: array{
 *         AccessToken?: 'days'|'hours'|'minutes'|'seconds',
 *         IdToken?: 'days'|'hours'|'minutes'|'seconds',
 *         RefreshToken?: 'days'|'hours'|'minutes'|'seconds',
 *         ...,
 *     },
 *     ReadAttributes?: list<string>,
 *     WriteAttributes?: list<string>,
 *     ExplicitAuthFlows?: list<'ADMIN_NO_SRP_AUTH'|'ALLOW_ADMIN_USER_PASSWORD_AUTH'|'ALLOW_CUSTOM_AUTH'|'ALLOW_REFRESH_TOKEN_AUTH'|'ALLOW_USER_AUTH'|'ALLOW_USER_PASSWORD_AUTH'|'ALLOW_USER_SRP_AUTH'|'CUSTOM_AUTH_FLOW_ONLY'|'USER_PASSWORD_AUTH'>,
 *     SupportedIdentityProviders?: list<string>,
 *     CallbackURLs?: list<string>,
 *     LogoutURLs?: list<string>,
 *     DefaultRedirectURI?: string,
 *     AllowedOAuthFlows?: list<'client_credentials'|'code'|'implicit'>,
 *     AllowedOAuthScopes?: list<string>,
 *     AllowedOAuthFlowsUserPoolClient?: bool,
 *     AnalyticsConfiguration?: array{
 *         ApplicationId?: string,
 *         ApplicationArn?: string,
 *         RoleArn?: string,
 *         ExternalId?: string,
 *         UserDataShared?: bool,
 *         ...,
 *     },
 *     PreventUserExistenceErrors?: 'ENABLED'|'LEGACY',
 *     EnableTokenRevocation?: bool,
 *     EnablePropagateAdditionalUserContextData?: bool,
 *     AuthSessionValidity?: int,
 *     RefreshTokenRotation?: array{Feature?: 'DISABLED'|'ENABLED', RetryGracePeriodSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserPoolDomain(array $args = [])
 * @phpstan-method \Aws\Result updateUserPoolDomain(array{
 *     Domain?: string,
 *     UserPoolId?: string,
 *     ManagedLoginVersion?: int,
 *     CustomDomainConfig?: array{CertificateArn?: string, SecurityPolicy?: 'TLS_V1'|'TLS_V1_2_2021'|'TLS_V1_3_2025', ...},
 *     Routing?: array{Failover?: array{SecondaryRegion?: string, PrimaryRoute53HealthCheckId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPoolDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserPoolDomainAsync(array{
 *     Domain?: string,
 *     UserPoolId?: string,
 *     ManagedLoginVersion?: int,
 *     CustomDomainConfig?: array{CertificateArn?: string, SecurityPolicy?: 'TLS_V1'|'TLS_V1_2_2021'|'TLS_V1_3_2025', ...},
 *     Routing?: array{Failover?: array{SecondaryRegion?: string, PrimaryRoute53HealthCheckId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserPoolReplica(array $args = [])
 * @phpstan-method \Aws\Result updateUserPoolReplica(array{UserPoolId?: string, RegionName?: string, Status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPoolReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserPoolReplicaAsync(array{UserPoolId?: string, RegionName?: string, Status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result verifySoftwareToken(array $args = [])
 * @phpstan-method \Aws\Result verifySoftwareToken(array{AccessToken?: string, Session?: string, UserCode?: string, FriendlyDeviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifySoftwareTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifySoftwareTokenAsync(array{AccessToken?: string, Session?: string, UserCode?: string, FriendlyDeviceName?: string, ...} $args = [])
 * @method \Aws\Result verifyUserAttribute(array $args = [])
 * @phpstan-method \Aws\Result verifyUserAttribute(array{AccessToken?: string, AttributeName?: string, Code?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyUserAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyUserAttributeAsync(array{AccessToken?: string, AttributeName?: string, Code?: string, ...} $args = [])
 */
class CognitoIdentityProviderClient extends AwsClient {}
