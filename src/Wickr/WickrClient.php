<?php
namespace Aws\Wickr;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Wickr Admin API** service.
 * @method \Aws\Result batchCreateUser(array $args = [])
 * @phpstan-method \Aws\Result batchCreateUser(array{
 *     networkId?: string,
 *     users?: list<array{
 *         firstName?: string,
 *         lastName?: string,
 *         securityGroupIds?: list<string>,
 *         username?: string,
 *         inviteCode?: string,
 *         inviteCodeTtl?: int,
 *         codeValidation?: bool,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateUserAsync(array{
 *     networkId?: string,
 *     users?: list<array{
 *         firstName?: string,
 *         lastName?: string,
 *         securityGroupIds?: list<string>,
 *         username?: string,
 *         inviteCode?: string,
 *         inviteCodeTtl?: int,
 *         codeValidation?: bool,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteUser(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteUser(array{networkId?: string, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteUserAsync(array{networkId?: string, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchLookupUserUname(array $args = [])
 * @phpstan-method \Aws\Result batchLookupUserUname(array{networkId?: string, unames?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchLookupUserUnameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchLookupUserUnameAsync(array{networkId?: string, unames?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchReinviteUser(array $args = [])
 * @phpstan-method \Aws\Result batchReinviteUser(array{networkId?: string, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchReinviteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchReinviteUserAsync(array{networkId?: string, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchResetDevicesForUser(array $args = [])
 * @phpstan-method \Aws\Result batchResetDevicesForUser(array{networkId?: string, userId?: string, appIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchResetDevicesForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchResetDevicesForUserAsync(array{networkId?: string, userId?: string, appIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchToggleUserSuspendStatus(array $args = [])
 * @phpstan-method \Aws\Result batchToggleUserSuspendStatus(array{networkId?: string, suspend?: bool, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchToggleUserSuspendStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchToggleUserSuspendStatusAsync(array{networkId?: string, suspend?: bool, userIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createBot(array $args = [])
 * @phpstan-method \Aws\Result createBot(array{networkId?: string, username?: string, displayName?: string, groupId?: string, challenge?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotAsync(array{networkId?: string, username?: string, displayName?: string, groupId?: string, challenge?: string, ...} $args = [])
 * @method \Aws\Result createDataRetentionBot(array $args = [])
 * @phpstan-method \Aws\Result createDataRetentionBot(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataRetentionBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataRetentionBotAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result createDataRetentionBotChallenge(array $args = [])
 * @phpstan-method \Aws\Result createDataRetentionBotChallenge(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataRetentionBotChallengeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataRetentionBotChallengeAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result createNetwork(array $args = [])
 * @phpstan-method \Aws\Result createNetwork(array{
 *     networkName?: string,
 *     accessLevel?: 'PREMIUM'|'STANDARD',
 *     enablePremiumFreeTrial?: bool,
 *     encryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkAsync(array{
 *     networkName?: string,
 *     accessLevel?: 'PREMIUM'|'STANDARD',
 *     enablePremiumFreeTrial?: bool,
 *     encryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result createSecurityGroup(array{
 *     networkId?: string,
 *     name?: string,
 *     securityGroupSettings?: array{
 *         lockoutThreshold?: int,
 *         permittedNetworks?: list<string>,
 *         enableGuestFederation?: bool,
 *         globalFederation?: bool,
 *         federationMode?: int,
 *         enableRestrictedGlobalFederation?: bool,
 *         permittedWickrAwsNetworks?: list<array>,
 *         permittedWickrEnterpriseNetworks?: list<array>,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityGroupAsync(array{
 *     networkId?: string,
 *     name?: string,
 *     securityGroupSettings?: array{
 *         lockoutThreshold?: int,
 *         permittedNetworks?: list<string>,
 *         enableGuestFederation?: bool,
 *         globalFederation?: bool,
 *         federationMode?: int,
 *         enableRestrictedGlobalFederation?: bool,
 *         permittedWickrAwsNetworks?: list<array>,
 *         permittedWickrEnterpriseNetworks?: list<array>,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBot(array $args = [])
 * @phpstan-method \Aws\Result deleteBot(array{networkId?: string, botId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAsync(array{networkId?: string, botId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataRetentionBot(array $args = [])
 * @phpstan-method \Aws\Result deleteDataRetentionBot(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataRetentionBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataRetentionBotAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result deleteNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteNetwork(array{networkId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkAsync(array{networkId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityGroup(array{networkId?: string, groupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityGroupAsync(array{networkId?: string, groupId?: string, ...} $args = [])
 * @method \Aws\Result getBot(array $args = [])
 * @phpstan-method \Aws\Result getBot(array{networkId?: string, botId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotAsync(array{networkId?: string, botId?: string, ...} $args = [])
 * @method \Aws\Result getBotsCount(array $args = [])
 * @phpstan-method \Aws\Result getBotsCount(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotsCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotsCountAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getDataRetentionBot(array $args = [])
 * @phpstan-method \Aws\Result getDataRetentionBot(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataRetentionBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataRetentionBotAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getGuestUserHistoryCount(array $args = [])
 * @phpstan-method \Aws\Result getGuestUserHistoryCount(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGuestUserHistoryCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGuestUserHistoryCountAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getNetwork(array $args = [])
 * @phpstan-method \Aws\Result getNetwork(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result getNetworkSettings(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkSettingsAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getOidcInfo(array $args = [])
 * @phpstan-method \Aws\Result getOidcInfo(array{
 *     networkId?: string,
 *     clientId?: string,
 *     code?: string,
 *     grantType?: string,
 *     redirectUri?: string,
 *     url?: string,
 *     clientSecret?: string,
 *     codeVerifier?: string,
 *     certificate?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOidcInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOidcInfoAsync(array{
 *     networkId?: string,
 *     clientId?: string,
 *     code?: string,
 *     grantType?: string,
 *     redirectUri?: string,
 *     url?: string,
 *     clientSecret?: string,
 *     codeVerifier?: string,
 *     certificate?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getOpentdfConfig(array $args = [])
 * @phpstan-method \Aws\Result getOpentdfConfig(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpentdfConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpentdfConfigAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result getSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result getSecurityGroup(array{networkId?: string, groupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityGroupAsync(array{networkId?: string, groupId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{
 *     networkId?: string,
 *     userId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{
 *     networkId?: string,
 *     userId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUsersCount(array $args = [])
 * @phpstan-method \Aws\Result getUsersCount(array{networkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsersCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsersCountAsync(array{networkId?: string, ...} $args = [])
 * @method \Aws\Result listBlockedGuestUsers(array $args = [])
 * @phpstan-method \Aws\Result listBlockedGuestUsers(array{
 *     networkId?: string,
 *     maxResults?: int,
 *     sortDirection?: 'ASC'|'DESC',
 *     sortFields?: string,
 *     username?: string,
 *     admin?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBlockedGuestUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBlockedGuestUsersAsync(array{
 *     networkId?: string,
 *     maxResults?: int,
 *     sortDirection?: 'ASC'|'DESC',
 *     sortFields?: string,
 *     username?: string,
 *     admin?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBots(array $args = [])
 * @phpstan-method \Aws\Result listBots(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     displayName?: string,
 *     username?: string,
 *     status?: int,
 *     groupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotsAsync(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     displayName?: string,
 *     username?: string,
 *     status?: int,
 *     groupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevicesForUser(array $args = [])
 * @phpstan-method \Aws\Result listDevicesForUser(array{
 *     networkId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesForUserAsync(array{
 *     networkId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGuestUsers(array $args = [])
 * @phpstan-method \Aws\Result listGuestUsers(array{
 *     networkId?: string,
 *     maxResults?: int,
 *     sortDirection?: 'ASC'|'DESC',
 *     sortFields?: string,
 *     username?: string,
 *     billingPeriod?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGuestUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGuestUsersAsync(array{
 *     networkId?: string,
 *     maxResults?: int,
 *     sortDirection?: 'ASC'|'DESC',
 *     sortFields?: string,
 *     username?: string,
 *     billingPeriod?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworks(array $args = [])
 * @phpstan-method \Aws\Result listNetworks(array{maxResults?: int, sortFields?: string, sortDirection?: 'ASC'|'DESC', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworksAsync(array{maxResults?: int, sortFields?: string, sortDirection?: 'ASC'|'DESC', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSecurityGroupUsers(array $args = [])
 * @phpstan-method \Aws\Result listSecurityGroupUsers(array{
 *     networkId?: string,
 *     groupId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityGroupUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityGroupUsersAsync(array{
 *     networkId?: string,
 *     groupId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result listSecurityGroups(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityGroupsAsync(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     firstName?: string,
 *     lastName?: string,
 *     username?: string,
 *     status?: int,
 *     groupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{
 *     networkId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortFields?: string,
 *     sortDirection?: 'ASC'|'DESC',
 *     firstName?: string,
 *     lastName?: string,
 *     username?: string,
 *     status?: int,
 *     groupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerOidcConfig(array $args = [])
 * @phpstan-method \Aws\Result registerOidcConfig(array{
 *     networkId?: string,
 *     companyId?: string,
 *     customUsername?: string,
 *     extraAuthParams?: string,
 *     issuer?: string,
 *     scopes?: string,
 *     secret?: string,
 *     ssoTokenBufferMinutes?: int,
 *     userId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOidcConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOidcConfigAsync(array{
 *     networkId?: string,
 *     companyId?: string,
 *     customUsername?: string,
 *     extraAuthParams?: string,
 *     issuer?: string,
 *     scopes?: string,
 *     secret?: string,
 *     ssoTokenBufferMinutes?: int,
 *     userId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerOidcConfigTest(array $args = [])
 * @phpstan-method \Aws\Result registerOidcConfigTest(array{
 *     networkId?: string,
 *     extraAuthParams?: string,
 *     issuer?: string,
 *     scopes?: string,
 *     certificate?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOidcConfigTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOidcConfigTestAsync(array{
 *     networkId?: string,
 *     extraAuthParams?: string,
 *     issuer?: string,
 *     scopes?: string,
 *     certificate?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerOpentdfConfig(array $args = [])
 * @phpstan-method \Aws\Result registerOpentdfConfig(array{
 *     networkId?: string,
 *     clientId?: string,
 *     clientSecret?: string,
 *     domain?: string,
 *     provider?: string,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOpentdfConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOpentdfConfigAsync(array{
 *     networkId?: string,
 *     clientId?: string,
 *     clientSecret?: string,
 *     domain?: string,
 *     provider?: string,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBot(array $args = [])
 * @phpstan-method \Aws\Result updateBot(array{
 *     networkId?: string,
 *     botId?: string,
 *     displayName?: string,
 *     groupId?: string,
 *     challenge?: string,
 *     suspend?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotAsync(array{
 *     networkId?: string,
 *     botId?: string,
 *     displayName?: string,
 *     groupId?: string,
 *     challenge?: string,
 *     suspend?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataRetention(array $args = [])
 * @phpstan-method \Aws\Result updateDataRetention(array{networkId?: string, actionType?: 'DISABLE'|'ENABLE'|'PUBKEY_MSG_ACK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataRetentionAsync(array{networkId?: string, actionType?: 'DISABLE'|'ENABLE'|'PUBKEY_MSG_ACK', ...} $args = [])
 * @method \Aws\Result updateGuestUser(array $args = [])
 * @phpstan-method \Aws\Result updateGuestUser(array{networkId?: string, usernameHash?: string, block?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGuestUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGuestUserAsync(array{networkId?: string, usernameHash?: string, block?: bool, ...} $args = [])
 * @method \Aws\Result updateNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateNetwork(array{networkId?: string, networkName?: string, clientToken?: string, encryptionKeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkAsync(array{networkId?: string, networkName?: string, clientToken?: string, encryptionKeyArn?: string, ...} $args = [])
 * @method \Aws\Result updateNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkSettings(array{
 *     networkId?: string,
 *     settings?: array{
 *         enableClientMetrics?: bool,
 *         readReceiptConfig?: array{status?: 'DISABLED'|'ENABLED'|'FORCE_ENABLED', ...},
 *         dataRetention?: bool,
 *         enableTrustedDataFormat?: bool,
 *         consentPopup?: array{enabled?: bool, header?: string, content?: string, closeButtonLabel?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkSettingsAsync(array{
 *     networkId?: string,
 *     settings?: array{
 *         enableClientMetrics?: bool,
 *         readReceiptConfig?: array{status?: 'DISABLED'|'ENABLED'|'FORCE_ENABLED', ...},
 *         dataRetention?: bool,
 *         enableTrustedDataFormat?: bool,
 *         consentPopup?: array{enabled?: bool, header?: string, content?: string, closeButtonLabel?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityGroup(array{
 *     networkId?: string,
 *     groupId?: string,
 *     name?: string,
 *     securityGroupSettings?: array{
 *         alwaysReauthenticate?: bool,
 *         atakPackageValues?: list<string>,
 *         calling?: array{canStart11Call?: bool, canVideoCall?: bool, forceTcpCall?: bool, ...},
 *         checkForUpdates?: bool,
 *         enableAtak?: bool,
 *         enableCrashReports?: bool,
 *         enableFileDownload?: bool,
 *         enableGuestFederation?: bool,
 *         enableNotificationPreview?: bool,
 *         enableOpenAccessOption?: bool,
 *         enableRestrictedGlobalFederation?: bool,
 *         filesEnabled?: bool,
 *         forceDeviceLockout?: int,
 *         forceOpenAccess?: bool,
 *         forceReadReceipts?: bool,
 *         globalFederation?: bool,
 *         isAtoEnabled?: bool,
 *         isLinkPreviewEnabled?: bool,
 *         locationAllowMaps?: bool,
 *         locationEnabled?: bool,
 *         maxAutoDownloadSize?: int,
 *         maxBor?: int,
 *         maxTtl?: int,
 *         messageForwardingEnabled?: bool,
 *         passwordRequirements?: array{lowercase?: int, minLength?: int, numbers?: int, symbols?: int, uppercase?: int, ...},
 *         presenceEnabled?: bool,
 *         quickResponses?: list<string>,
 *         showMasterRecoveryKey?: bool,
 *         shredder?: array{canProcessManually?: bool, intensity?: int, ...},
 *         ssoMaxIdleMinutes?: int,
 *         maxNonSsoSessionMinutes?: int,
 *         federationMode?: int,
 *         lockoutThreshold?: int,
 *         permittedNetworks?: list<string>,
 *         permittedWickrAwsNetworks?: list<array>,
 *         permittedWickrEnterpriseNetworks?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityGroupAsync(array{
 *     networkId?: string,
 *     groupId?: string,
 *     name?: string,
 *     securityGroupSettings?: array{
 *         alwaysReauthenticate?: bool,
 *         atakPackageValues?: list<string>,
 *         calling?: array{canStart11Call?: bool, canVideoCall?: bool, forceTcpCall?: bool, ...},
 *         checkForUpdates?: bool,
 *         enableAtak?: bool,
 *         enableCrashReports?: bool,
 *         enableFileDownload?: bool,
 *         enableGuestFederation?: bool,
 *         enableNotificationPreview?: bool,
 *         enableOpenAccessOption?: bool,
 *         enableRestrictedGlobalFederation?: bool,
 *         filesEnabled?: bool,
 *         forceDeviceLockout?: int,
 *         forceOpenAccess?: bool,
 *         forceReadReceipts?: bool,
 *         globalFederation?: bool,
 *         isAtoEnabled?: bool,
 *         isLinkPreviewEnabled?: bool,
 *         locationAllowMaps?: bool,
 *         locationEnabled?: bool,
 *         maxAutoDownloadSize?: int,
 *         maxBor?: int,
 *         maxTtl?: int,
 *         messageForwardingEnabled?: bool,
 *         passwordRequirements?: array{lowercase?: int, minLength?: int, numbers?: int, symbols?: int, uppercase?: int, ...},
 *         presenceEnabled?: bool,
 *         quickResponses?: list<string>,
 *         showMasterRecoveryKey?: bool,
 *         shredder?: array{canProcessManually?: bool, intensity?: int, ...},
 *         ssoMaxIdleMinutes?: int,
 *         maxNonSsoSessionMinutes?: int,
 *         federationMode?: int,
 *         lockoutThreshold?: int,
 *         permittedNetworks?: list<string>,
 *         permittedWickrAwsNetworks?: list<array>,
 *         permittedWickrEnterpriseNetworks?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     networkId?: string,
 *     userId?: string,
 *     userDetails?: array{
 *         firstName?: string,
 *         lastName?: string,
 *         username?: string,
 *         securityGroupIds?: list<string>,
 *         inviteCode?: string,
 *         inviteCodeTtl?: int,
 *         codeValidation?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     networkId?: string,
 *     userId?: string,
 *     userDetails?: array{
 *         firstName?: string,
 *         lastName?: string,
 *         username?: string,
 *         securityGroupIds?: list<string>,
 *         inviteCode?: string,
 *         inviteCodeTtl?: int,
 *         codeValidation?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class WickrClient extends AwsClient {}
