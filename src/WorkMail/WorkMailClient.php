<?php
namespace Aws\WorkMail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkMail** service.
 * @method \Aws\Result associateDelegateToResource(array $args = [])
 * @phpstan-method \Aws\Result associateDelegateToResource(array{OrganizationId?: string, ResourceId?: string, EntityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDelegateToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDelegateToResourceAsync(array{OrganizationId?: string, ResourceId?: string, EntityId?: string, ...} $args = [])
 * @method \Aws\Result associateMemberToGroup(array $args = [])
 * @phpstan-method \Aws\Result associateMemberToGroup(array{OrganizationId?: string, GroupId?: string, MemberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberToGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberToGroupAsync(array{OrganizationId?: string, GroupId?: string, MemberId?: string, ...} $args = [])
 * @method \Aws\Result assumeImpersonationRole(array $args = [])
 * @phpstan-method \Aws\Result assumeImpersonationRole(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeImpersonationRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeImpersonationRoleAsync(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \Aws\Result cancelMailboxExportJob(array $args = [])
 * @phpstan-method \Aws\Result cancelMailboxExportJob(array{ClientToken?: string, JobId?: string, OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMailboxExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMailboxExportJobAsync(array{ClientToken?: string, JobId?: string, OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{OrganizationId?: string, EntityId?: string, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{OrganizationId?: string, EntityId?: string, Alias?: string, ...} $args = [])
 * @method \Aws\Result createAvailabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createAvailabilityConfiguration(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAvailabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAvailabilityConfigurationAsync(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{OrganizationId?: string, Name?: string, HiddenFromGlobalAddressList?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{OrganizationId?: string, Name?: string, HiddenFromGlobalAddressList?: bool, ...} $args = [])
 * @method \Aws\Result createIdentityCenterApplication(array $args = [])
 * @phpstan-method \Aws\Result createIdentityCenterApplication(array{Name?: string, InstanceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdentityCenterApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentityCenterApplicationAsync(array{Name?: string, InstanceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result createImpersonationRole(array $args = [])
 * @phpstan-method \Aws\Result createImpersonationRole(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     Name?: string,
 *     Type?: 'FULL_ACCESS'|'READ_ONLY',
 *     Description?: string,
 *     Rules?: list<array{
 *         ImpersonationRuleId?: string,
 *         Name?: string,
 *         Description?: string,
 *         Effect?: 'ALLOW'|'DENY',
 *         TargetUsers?: list<string>,
 *         NotTargetUsers?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImpersonationRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImpersonationRoleAsync(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     Name?: string,
 *     Type?: 'FULL_ACCESS'|'READ_ONLY',
 *     Description?: string,
 *     Rules?: list<array{
 *         ImpersonationRuleId?: string,
 *         Name?: string,
 *         Description?: string,
 *         Effect?: 'ALLOW'|'DENY',
 *         TargetUsers?: list<string>,
 *         NotTargetUsers?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMobileDeviceAccessRule(array $args = [])
 * @phpstan-method \Aws\Result createMobileDeviceAccessRule(array{
 *     OrganizationId?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     DeviceTypes?: list<string>,
 *     NotDeviceTypes?: list<string>,
 *     DeviceModels?: list<string>,
 *     NotDeviceModels?: list<string>,
 *     DeviceOperatingSystems?: list<string>,
 *     NotDeviceOperatingSystems?: list<string>,
 *     DeviceUserAgents?: list<string>,
 *     NotDeviceUserAgents?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMobileDeviceAccessRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMobileDeviceAccessRuleAsync(array{
 *     OrganizationId?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     DeviceTypes?: list<string>,
 *     NotDeviceTypes?: list<string>,
 *     DeviceModels?: list<string>,
 *     NotDeviceModels?: list<string>,
 *     DeviceOperatingSystems?: list<string>,
 *     NotDeviceOperatingSystems?: list<string>,
 *     DeviceUserAgents?: list<string>,
 *     NotDeviceUserAgents?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOrganization(array $args = [])
 * @phpstan-method \Aws\Result createOrganization(array{
 *     DirectoryId?: string,
 *     Alias?: string,
 *     ClientToken?: string,
 *     Domains?: list<array{DomainName?: string, HostedZoneId?: string, ...}>,
 *     KmsKeyArn?: string,
 *     EnableInteroperability?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOrganizationAsync(array{
 *     DirectoryId?: string,
 *     Alias?: string,
 *     ClientToken?: string,
 *     Domains?: list<array{DomainName?: string, HostedZoneId?: string, ...}>,
 *     KmsKeyArn?: string,
 *     EnableInteroperability?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResource(array $args = [])
 * @phpstan-method \Aws\Result createResource(array{
 *     OrganizationId?: string,
 *     Name?: string,
 *     Type?: 'EQUIPMENT'|'ROOM',
 *     Description?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceAsync(array{
 *     OrganizationId?: string,
 *     Name?: string,
 *     Type?: 'EQUIPMENT'|'ROOM',
 *     Description?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     OrganizationId?: string,
 *     Name?: string,
 *     DisplayName?: string,
 *     Password?: string,
 *     Role?: 'REMOTE_USER'|'RESOURCE'|'SYSTEM_USER'|'USER',
 *     FirstName?: string,
 *     LastName?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     IdentityProviderUserId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     OrganizationId?: string,
 *     Name?: string,
 *     DisplayName?: string,
 *     Password?: string,
 *     Role?: 'REMOTE_USER'|'RESOURCE'|'SYSTEM_USER'|'USER',
 *     FirstName?: string,
 *     LastName?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     IdentityProviderUserId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessControlRule(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessControlRule(array{OrganizationId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessControlRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessControlRuleAsync(array{OrganizationId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAlias(array{OrganizationId?: string, EntityId?: string, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAliasAsync(array{OrganizationId?: string, EntityId?: string, Alias?: string, ...} $args = [])
 * @method \Aws\Result deleteAvailabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAvailabilityConfiguration(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAvailabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAvailabilityConfigurationAsync(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailMonitoringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailMonitoringConfiguration(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailMonitoringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailMonitoringConfigurationAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{OrganizationId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{OrganizationId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityCenterApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityCenterApplication(array{ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityCenterApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityCenterApplicationAsync(array{ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityProviderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityProviderConfiguration(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityProviderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityProviderConfigurationAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result deleteImpersonationRole(array $args = [])
 * @phpstan-method \Aws\Result deleteImpersonationRole(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImpersonationRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImpersonationRoleAsync(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \Aws\Result deleteMailboxPermissions(array $args = [])
 * @phpstan-method \Aws\Result deleteMailboxPermissions(array{OrganizationId?: string, EntityId?: string, GranteeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMailboxPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMailboxPermissionsAsync(array{OrganizationId?: string, EntityId?: string, GranteeId?: string, ...} $args = [])
 * @method \Aws\Result deleteMobileDeviceAccessOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteMobileDeviceAccessOverride(array{OrganizationId?: string, UserId?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMobileDeviceAccessOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMobileDeviceAccessOverrideAsync(array{OrganizationId?: string, UserId?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result deleteMobileDeviceAccessRule(array $args = [])
 * @phpstan-method \Aws\Result deleteMobileDeviceAccessRule(array{OrganizationId?: string, MobileDeviceAccessRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMobileDeviceAccessRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMobileDeviceAccessRuleAsync(array{OrganizationId?: string, MobileDeviceAccessRuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteOrganization(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     DeleteDirectory?: bool,
 *     ForceDelete?: bool,
 *     DeleteIdentityCenterApplication?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOrganizationAsync(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     DeleteDirectory?: bool,
 *     ForceDelete?: bool,
 *     DeleteIdentityCenterApplication?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePersonalAccessToken(array $args = [])
 * @phpstan-method \Aws\Result deletePersonalAccessToken(array{OrganizationId?: string, PersonalAccessTokenId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePersonalAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePersonalAccessTokenAsync(array{OrganizationId?: string, PersonalAccessTokenId?: string, ...} $args = [])
 * @method \Aws\Result deleteResource(array $args = [])
 * @phpstan-method \Aws\Result deleteResource(array{OrganizationId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceAsync(array{OrganizationId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteRetentionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRetentionPolicy(array{OrganizationId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRetentionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRetentionPolicyAsync(array{OrganizationId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result deregisterFromWorkMail(array $args = [])
 * @phpstan-method \Aws\Result deregisterFromWorkMail(array{OrganizationId?: string, EntityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterFromWorkMailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterFromWorkMailAsync(array{OrganizationId?: string, EntityId?: string, ...} $args = [])
 * @method \Aws\Result deregisterMailDomain(array $args = [])
 * @phpstan-method \Aws\Result deregisterMailDomain(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterMailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterMailDomainAsync(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeEmailMonitoringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeEmailMonitoringConfiguration(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEmailMonitoringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEmailMonitoringConfigurationAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result describeEntity(array $args = [])
 * @phpstan-method \Aws\Result describeEntity(array{OrganizationId?: string, Email?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityAsync(array{OrganizationId?: string, Email?: string, ...} $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @phpstan-method \Aws\Result describeGroup(array{OrganizationId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupAsync(array{OrganizationId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityProviderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityProviderConfiguration(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityProviderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityProviderConfigurationAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result describeInboundDmarcSettings(array $args = [])
 * @phpstan-method \Aws\Result describeInboundDmarcSettings(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInboundDmarcSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInboundDmarcSettingsAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result describeMailboxExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeMailboxExportJob(array{JobId?: string, OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMailboxExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMailboxExportJobAsync(array{JobId?: string, OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result describeOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeOrganization(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result describeResource(array $args = [])
 * @phpstan-method \Aws\Result describeResource(array{OrganizationId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceAsync(array{OrganizationId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result disassociateDelegateFromResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateDelegateFromResource(array{OrganizationId?: string, ResourceId?: string, EntityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDelegateFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDelegateFromResourceAsync(array{OrganizationId?: string, ResourceId?: string, EntityId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMemberFromGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateMemberFromGroup(array{OrganizationId?: string, GroupId?: string, MemberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberFromGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberFromGroupAsync(array{OrganizationId?: string, GroupId?: string, MemberId?: string, ...} $args = [])
 * @method \Aws\Result getAccessControlEffect(array $args = [])
 * @phpstan-method \Aws\Result getAccessControlEffect(array{
 *     OrganizationId?: string,
 *     IpAddress?: string,
 *     Action?: string,
 *     UserId?: string,
 *     ImpersonationRoleId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessControlEffectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessControlEffectAsync(array{
 *     OrganizationId?: string,
 *     IpAddress?: string,
 *     Action?: string,
 *     UserId?: string,
 *     ImpersonationRoleId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDefaultRetentionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDefaultRetentionPolicy(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultRetentionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultRetentionPolicyAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result getImpersonationRole(array $args = [])
 * @phpstan-method \Aws\Result getImpersonationRole(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImpersonationRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImpersonationRoleAsync(array{OrganizationId?: string, ImpersonationRoleId?: string, ...} $args = [])
 * @method \Aws\Result getImpersonationRoleEffect(array $args = [])
 * @phpstan-method \Aws\Result getImpersonationRoleEffect(array{OrganizationId?: string, ImpersonationRoleId?: string, TargetUser?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImpersonationRoleEffectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImpersonationRoleEffectAsync(array{OrganizationId?: string, ImpersonationRoleId?: string, TargetUser?: string, ...} $args = [])
 * @method \Aws\Result getMailDomain(array $args = [])
 * @phpstan-method \Aws\Result getMailDomain(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMailDomainAsync(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getMailboxDetails(array $args = [])
 * @phpstan-method \Aws\Result getMailboxDetails(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMailboxDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMailboxDetailsAsync(array{OrganizationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result getMobileDeviceAccessEffect(array $args = [])
 * @phpstan-method \Aws\Result getMobileDeviceAccessEffect(array{
 *     OrganizationId?: string,
 *     DeviceType?: string,
 *     DeviceModel?: string,
 *     DeviceOperatingSystem?: string,
 *     DeviceUserAgent?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMobileDeviceAccessEffectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMobileDeviceAccessEffectAsync(array{
 *     OrganizationId?: string,
 *     DeviceType?: string,
 *     DeviceModel?: string,
 *     DeviceOperatingSystem?: string,
 *     DeviceUserAgent?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMobileDeviceAccessOverride(array $args = [])
 * @phpstan-method \Aws\Result getMobileDeviceAccessOverride(array{OrganizationId?: string, UserId?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMobileDeviceAccessOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMobileDeviceAccessOverrideAsync(array{OrganizationId?: string, UserId?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result getPersonalAccessTokenMetadata(array $args = [])
 * @phpstan-method \Aws\Result getPersonalAccessTokenMetadata(array{OrganizationId?: string, PersonalAccessTokenId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPersonalAccessTokenMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPersonalAccessTokenMetadataAsync(array{OrganizationId?: string, PersonalAccessTokenId?: string, ...} $args = [])
 * @method \Aws\Result listAccessControlRules(array $args = [])
 * @phpstan-method \Aws\Result listAccessControlRules(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessControlRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessControlRulesAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{OrganizationId?: string, EntityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{OrganizationId?: string, EntityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAvailabilityConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listAvailabilityConfigurations(array{OrganizationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailabilityConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailabilityConfigurationsAsync(array{OrganizationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGroupMembers(array $args = [])
 * @phpstan-method \Aws\Result listGroupMembers(array{OrganizationId?: string, GroupId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupMembersAsync(array{OrganizationId?: string, GroupId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{NamePrefix?: string, PrimaryEmailPrefix?: string, State?: 'DELETED'|'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{NamePrefix?: string, PrimaryEmailPrefix?: string, State?: 'DELETED'|'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroupsForEntity(array $args = [])
 * @phpstan-method \Aws\Result listGroupsForEntity(array{
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     Filters?: array{GroupNamePrefix?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsForEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsForEntityAsync(array{
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     Filters?: array{GroupNamePrefix?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImpersonationRoles(array $args = [])
 * @phpstan-method \Aws\Result listImpersonationRoles(array{OrganizationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImpersonationRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImpersonationRolesAsync(array{OrganizationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMailDomains(array $args = [])
 * @phpstan-method \Aws\Result listMailDomains(array{OrganizationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMailDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMailDomainsAsync(array{OrganizationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMailboxExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listMailboxExportJobs(array{OrganizationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMailboxExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMailboxExportJobsAsync(array{OrganizationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMailboxPermissions(array $args = [])
 * @phpstan-method \Aws\Result listMailboxPermissions(array{OrganizationId?: string, EntityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMailboxPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMailboxPermissionsAsync(array{OrganizationId?: string, EntityId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMobileDeviceAccessOverrides(array $args = [])
 * @phpstan-method \Aws\Result listMobileDeviceAccessOverrides(array{OrganizationId?: string, UserId?: string, DeviceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMobileDeviceAccessOverridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMobileDeviceAccessOverridesAsync(array{OrganizationId?: string, UserId?: string, DeviceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMobileDeviceAccessRules(array $args = [])
 * @phpstan-method \Aws\Result listMobileDeviceAccessRules(array{OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMobileDeviceAccessRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMobileDeviceAccessRulesAsync(array{OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result listOrganizations(array $args = [])
 * @phpstan-method \Aws\Result listOrganizations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPersonalAccessTokens(array $args = [])
 * @phpstan-method \Aws\Result listPersonalAccessTokens(array{OrganizationId?: string, UserId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPersonalAccessTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPersonalAccessTokensAsync(array{OrganizationId?: string, UserId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listResourceDelegates(array $args = [])
 * @phpstan-method \Aws\Result listResourceDelegates(array{OrganizationId?: string, ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceDelegatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceDelegatesAsync(array{OrganizationId?: string, ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{NamePrefix?: string, PrimaryEmailPrefix?: string, State?: 'DELETED'|'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{NamePrefix?: string, PrimaryEmailPrefix?: string, State?: 'DELETED'|'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{
 *         UsernamePrefix?: string,
 *         DisplayNamePrefix?: string,
 *         PrimaryEmailPrefix?: string,
 *         State?: 'DELETED'|'DISABLED'|'ENABLED',
 *         IdentityProviderUserIdPrefix?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{
 *     OrganizationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{
 *         UsernamePrefix?: string,
 *         DisplayNamePrefix?: string,
 *         PrimaryEmailPrefix?: string,
 *         State?: 'DELETED'|'DISABLED'|'ENABLED',
 *         IdentityProviderUserIdPrefix?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccessControlRule(array $args = [])
 * @phpstan-method \Aws\Result putAccessControlRule(array{
 *     Name?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     Description?: string,
 *     IpRanges?: list<string>,
 *     NotIpRanges?: list<string>,
 *     Actions?: list<string>,
 *     NotActions?: list<string>,
 *     UserIds?: list<string>,
 *     NotUserIds?: list<string>,
 *     OrganizationId?: string,
 *     ImpersonationRoleIds?: list<string>,
 *     NotImpersonationRoleIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessControlRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessControlRuleAsync(array{
 *     Name?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     Description?: string,
 *     IpRanges?: list<string>,
 *     NotIpRanges?: list<string>,
 *     Actions?: list<string>,
 *     NotActions?: list<string>,
 *     UserIds?: list<string>,
 *     NotUserIds?: list<string>,
 *     OrganizationId?: string,
 *     ImpersonationRoleIds?: list<string>,
 *     NotImpersonationRoleIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEmailMonitoringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEmailMonitoringConfiguration(array{OrganizationId?: string, RoleArn?: string, LogGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailMonitoringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailMonitoringConfigurationAsync(array{OrganizationId?: string, RoleArn?: string, LogGroupArn?: string, ...} $args = [])
 * @method \Aws\Result putIdentityProviderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putIdentityProviderConfiguration(array{
 *     OrganizationId?: string,
 *     AuthenticationMode?: 'IDENTITY_PROVIDER_AND_DIRECTORY'|'IDENTITY_PROVIDER_ONLY',
 *     IdentityCenterConfiguration?: array{InstanceArn?: string, ApplicationArn?: string, ...},
 *     PersonalAccessTokenConfiguration?: array{Status?: 'ACTIVE'|'INACTIVE', LifetimeInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIdentityProviderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIdentityProviderConfigurationAsync(array{
 *     OrganizationId?: string,
 *     AuthenticationMode?: 'IDENTITY_PROVIDER_AND_DIRECTORY'|'IDENTITY_PROVIDER_ONLY',
 *     IdentityCenterConfiguration?: array{InstanceArn?: string, ApplicationArn?: string, ...},
 *     PersonalAccessTokenConfiguration?: array{Status?: 'ACTIVE'|'INACTIVE', LifetimeInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInboundDmarcSettings(array $args = [])
 * @phpstan-method \Aws\Result putInboundDmarcSettings(array{OrganizationId?: string, Enforced?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putInboundDmarcSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInboundDmarcSettingsAsync(array{OrganizationId?: string, Enforced?: bool, ...} $args = [])
 * @method \Aws\Result putMailboxPermissions(array $args = [])
 * @phpstan-method \Aws\Result putMailboxPermissions(array{
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     GranteeId?: string,
 *     PermissionValues?: list<'FULL_ACCESS'|'SEND_AS'|'SEND_ON_BEHALF'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMailboxPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMailboxPermissionsAsync(array{
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     GranteeId?: string,
 *     PermissionValues?: list<'FULL_ACCESS'|'SEND_AS'|'SEND_ON_BEHALF'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMobileDeviceAccessOverride(array $args = [])
 * @phpstan-method \Aws\Result putMobileDeviceAccessOverride(array{
 *     OrganizationId?: string,
 *     UserId?: string,
 *     DeviceId?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMobileDeviceAccessOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMobileDeviceAccessOverrideAsync(array{
 *     OrganizationId?: string,
 *     UserId?: string,
 *     DeviceId?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRetentionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putRetentionPolicy(array{
 *     OrganizationId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     FolderConfigurations?: list<array{
 *         Name?: 'DELETED_ITEMS'|'DRAFTS'|'INBOX'|'JUNK_EMAIL'|'SENT_ITEMS',
 *         Action?: 'DELETE'|'NONE'|'PERMANENTLY_DELETE',
 *         Period?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRetentionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRetentionPolicyAsync(array{
 *     OrganizationId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     FolderConfigurations?: list<array{
 *         Name?: 'DELETED_ITEMS'|'DRAFTS'|'INBOX'|'JUNK_EMAIL'|'SENT_ITEMS',
 *         Action?: 'DELETE'|'NONE'|'PERMANENTLY_DELETE',
 *         Period?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerMailDomain(array $args = [])
 * @phpstan-method \Aws\Result registerMailDomain(array{ClientToken?: string, OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerMailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerMailDomainAsync(array{ClientToken?: string, OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result registerToWorkMail(array $args = [])
 * @phpstan-method \Aws\Result registerToWorkMail(array{OrganizationId?: string, EntityId?: string, Email?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerToWorkMailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerToWorkMailAsync(array{OrganizationId?: string, EntityId?: string, Email?: string, ...} $args = [])
 * @method \Aws\Result resetPassword(array $args = [])
 * @phpstan-method \Aws\Result resetPassword(array{OrganizationId?: string, UserId?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetPasswordAsync(array{OrganizationId?: string, UserId?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result startMailboxExportJob(array $args = [])
 * @phpstan-method \Aws\Result startMailboxExportJob(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     KmsKeyArn?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMailboxExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMailboxExportJobAsync(array{
 *     ClientToken?: string,
 *     OrganizationId?: string,
 *     EntityId?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     KmsKeyArn?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testAvailabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result testAvailabilityConfiguration(array{
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testAvailabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testAvailabilityConfigurationAsync(array{
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAvailabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAvailabilityConfiguration(array{
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAvailabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAvailabilityConfigurationAsync(array{
 *     OrganizationId?: string,
 *     DomainName?: string,
 *     EwsProvider?: array{EwsEndpoint?: string, EwsUsername?: string, EwsPassword?: string, ...},
 *     LambdaProvider?: array{LambdaArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDefaultMailDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDefaultMailDomain(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDefaultMailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDefaultMailDomainAsync(array{OrganizationId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{OrganizationId?: string, GroupId?: string, HiddenFromGlobalAddressList?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{OrganizationId?: string, GroupId?: string, HiddenFromGlobalAddressList?: bool, ...} $args = [])
 * @method \Aws\Result updateImpersonationRole(array $args = [])
 * @phpstan-method \Aws\Result updateImpersonationRole(array{
 *     OrganizationId?: string,
 *     ImpersonationRoleId?: string,
 *     Name?: string,
 *     Type?: 'FULL_ACCESS'|'READ_ONLY',
 *     Description?: string,
 *     Rules?: list<array{
 *         ImpersonationRuleId?: string,
 *         Name?: string,
 *         Description?: string,
 *         Effect?: 'ALLOW'|'DENY',
 *         TargetUsers?: list<string>,
 *         NotTargetUsers?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImpersonationRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImpersonationRoleAsync(array{
 *     OrganizationId?: string,
 *     ImpersonationRoleId?: string,
 *     Name?: string,
 *     Type?: 'FULL_ACCESS'|'READ_ONLY',
 *     Description?: string,
 *     Rules?: list<array{
 *         ImpersonationRuleId?: string,
 *         Name?: string,
 *         Description?: string,
 *         Effect?: 'ALLOW'|'DENY',
 *         TargetUsers?: list<string>,
 *         NotTargetUsers?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMailboxQuota(array $args = [])
 * @phpstan-method \Aws\Result updateMailboxQuota(array{OrganizationId?: string, UserId?: string, MailboxQuota?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMailboxQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMailboxQuotaAsync(array{OrganizationId?: string, UserId?: string, MailboxQuota?: int, ...} $args = [])
 * @method \Aws\Result updateMobileDeviceAccessRule(array $args = [])
 * @phpstan-method \Aws\Result updateMobileDeviceAccessRule(array{
 *     OrganizationId?: string,
 *     MobileDeviceAccessRuleId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     DeviceTypes?: list<string>,
 *     NotDeviceTypes?: list<string>,
 *     DeviceModels?: list<string>,
 *     NotDeviceModels?: list<string>,
 *     DeviceOperatingSystems?: list<string>,
 *     NotDeviceOperatingSystems?: list<string>,
 *     DeviceUserAgents?: list<string>,
 *     NotDeviceUserAgents?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMobileDeviceAccessRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMobileDeviceAccessRuleAsync(array{
 *     OrganizationId?: string,
 *     MobileDeviceAccessRuleId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Effect?: 'ALLOW'|'DENY',
 *     DeviceTypes?: list<string>,
 *     NotDeviceTypes?: list<string>,
 *     DeviceModels?: list<string>,
 *     NotDeviceModels?: list<string>,
 *     DeviceOperatingSystems?: list<string>,
 *     NotDeviceOperatingSystems?: list<string>,
 *     DeviceUserAgents?: list<string>,
 *     NotDeviceUserAgents?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePrimaryEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result updatePrimaryEmailAddress(array{OrganizationId?: string, EntityId?: string, Email?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrimaryEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrimaryEmailAddressAsync(array{OrganizationId?: string, EntityId?: string, Email?: string, ...} $args = [])
 * @method \Aws\Result updateResource(array $args = [])
 * @phpstan-method \Aws\Result updateResource(array{
 *     OrganizationId?: string,
 *     ResourceId?: string,
 *     Name?: string,
 *     BookingOptions?: array{
 *         AutoAcceptRequests?: bool,
 *         AutoDeclineRecurringRequests?: bool,
 *         AutoDeclineConflictingRequests?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     Type?: 'EQUIPMENT'|'ROOM',
 *     HiddenFromGlobalAddressList?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceAsync(array{
 *     OrganizationId?: string,
 *     ResourceId?: string,
 *     Name?: string,
 *     BookingOptions?: array{
 *         AutoAcceptRequests?: bool,
 *         AutoDeclineRecurringRequests?: bool,
 *         AutoDeclineConflictingRequests?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     Type?: 'EQUIPMENT'|'ROOM',
 *     HiddenFromGlobalAddressList?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     OrganizationId?: string,
 *     UserId?: string,
 *     Role?: 'REMOTE_USER'|'RESOURCE'|'SYSTEM_USER'|'USER',
 *     DisplayName?: string,
 *     FirstName?: string,
 *     LastName?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     Initials?: string,
 *     Telephone?: string,
 *     Street?: string,
 *     JobTitle?: string,
 *     City?: string,
 *     Company?: string,
 *     ZipCode?: string,
 *     Department?: string,
 *     Country?: string,
 *     Office?: string,
 *     IdentityProviderUserId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     OrganizationId?: string,
 *     UserId?: string,
 *     Role?: 'REMOTE_USER'|'RESOURCE'|'SYSTEM_USER'|'USER',
 *     DisplayName?: string,
 *     FirstName?: string,
 *     LastName?: string,
 *     HiddenFromGlobalAddressList?: bool,
 *     Initials?: string,
 *     Telephone?: string,
 *     Street?: string,
 *     JobTitle?: string,
 *     City?: string,
 *     Company?: string,
 *     ZipCode?: string,
 *     Department?: string,
 *     Country?: string,
 *     Office?: string,
 *     IdentityProviderUserId?: string,
 *     ...,
 * } $args = [])
 */
class WorkMailClient extends AwsClient {}
