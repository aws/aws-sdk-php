<?php
namespace Aws\Chime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime** service.
 * @method \Aws\Result associatePhoneNumberWithUser(array $args = [])
 * @phpstan-method \Aws\Result associatePhoneNumberWithUser(array{AccountId?: string, UserId?: string, E164PhoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumberWithUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePhoneNumberWithUserAsync(array{AccountId?: string, UserId?: string, E164PhoneNumber?: string, ...} $args = [])
 * @method \Aws\Result associateSigninDelegateGroupsWithAccount(array $args = [])
 * @phpstan-method \Aws\Result associateSigninDelegateGroupsWithAccount(array{AccountId?: string, SigninDelegateGroups?: list<array{GroupName?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSigninDelegateGroupsWithAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSigninDelegateGroupsWithAccountAsync(array{AccountId?: string, SigninDelegateGroups?: list<array{GroupName?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchCreateRoomMembership(array $args = [])
 * @phpstan-method \Aws\Result batchCreateRoomMembership(array{
 *     AccountId?: string,
 *     RoomId?: string,
 *     MembershipItemList?: list<array{MemberId?: string, Role?: 'Administrator'|'Member', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateRoomMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateRoomMembershipAsync(array{
 *     AccountId?: string,
 *     RoomId?: string,
 *     MembershipItemList?: list<array{MemberId?: string, Role?: 'Administrator'|'Member', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeletePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result batchDeletePhoneNumber(array{PhoneNumberIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array{PhoneNumberIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchSuspendUser(array $args = [])
 * @phpstan-method \Aws\Result batchSuspendUser(array{AccountId?: string, UserIdList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchSuspendUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchSuspendUserAsync(array{AccountId?: string, UserIdList?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUnsuspendUser(array $args = [])
 * @phpstan-method \Aws\Result batchUnsuspendUser(array{AccountId?: string, UserIdList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUnsuspendUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUnsuspendUserAsync(array{AccountId?: string, UserIdList?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result batchUpdatePhoneNumber(array{
 *     UpdatePhoneNumberRequestItems?: list<array{
 *         PhoneNumberId?: string,
 *         ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *         CallingName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array{
 *     UpdatePhoneNumberRequestItems?: list<array{
 *         PhoneNumberId?: string,
 *         ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *         CallingName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateUser(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateUser(array{
 *     AccountId?: string,
 *     UpdateUserRequestItems?: list<array{
 *         UserId?: string,
 *         LicenseType?: 'Basic'|'Plus'|'Pro'|'ProTrial',
 *         UserType?: 'PrivateUser'|'SharedDevice',
 *         AlexaForBusinessMetadata?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateUserAsync(array{
 *     AccountId?: string,
 *     UpdateUserRequestItems?: list<array{
 *         UserId?: string,
 *         LicenseType?: 'Basic'|'Plus'|'Pro'|'ProTrial',
 *         UserType?: 'PrivateUser'|'SharedDevice',
 *         AlexaForBusinessMetadata?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccount(array $args = [])
 * @phpstan-method \Aws\Result createAccount(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result createBot(array $args = [])
 * @phpstan-method \Aws\Result createBot(array{AccountId?: string, DisplayName?: string, Domain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotAsync(array{AccountId?: string, DisplayName?: string, Domain?: string, ...} $args = [])
 * @method \Aws\Result createMeetingDialOut(array $args = [])
 * @phpstan-method \Aws\Result createMeetingDialOut(array{MeetingId?: string, FromPhoneNumber?: string, ToPhoneNumber?: string, JoinToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingDialOutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMeetingDialOutAsync(array{MeetingId?: string, FromPhoneNumber?: string, ToPhoneNumber?: string, JoinToken?: string, ...} $args = [])
 * @method \Aws\Result createPhoneNumberOrder(array $args = [])
 * @phpstan-method \Aws\Result createPhoneNumberOrder(array{
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     E164PhoneNumbers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array{
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     E164PhoneNumbers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoom(array $args = [])
 * @phpstan-method \Aws\Result createRoom(array{AccountId?: string, Name?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoomAsync(array{AccountId?: string, Name?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createRoomMembership(array $args = [])
 * @phpstan-method \Aws\Result createRoomMembership(array{AccountId?: string, RoomId?: string, MemberId?: string, Role?: 'Administrator'|'Member', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoomMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoomMembershipAsync(array{AccountId?: string, RoomId?: string, MemberId?: string, Role?: 'Administrator'|'Member', ...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{AccountId?: string, Username?: string, Email?: string, UserType?: 'PrivateUser'|'SharedDevice', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{AccountId?: string, Username?: string, Email?: string, UserType?: 'PrivateUser'|'SharedDevice', ...} $args = [])
 * @method \Aws\Result deleteAccount(array $args = [])
 * @phpstan-method \Aws\Result deleteAccount(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteEventsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEventsConfiguration(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventsConfigurationAsync(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \Aws\Result deletePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result deletePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result deleteRoom(array $args = [])
 * @phpstan-method \Aws\Result deleteRoom(array{AccountId?: string, RoomId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoomAsync(array{AccountId?: string, RoomId?: string, ...} $args = [])
 * @method \Aws\Result deleteRoomMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteRoomMembership(array{AccountId?: string, RoomId?: string, MemberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoomMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoomMembershipAsync(array{AccountId?: string, RoomId?: string, MemberId?: string, ...} $args = [])
 * @method \Aws\Result disassociatePhoneNumberFromUser(array $args = [])
 * @phpstan-method \Aws\Result disassociatePhoneNumberFromUser(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumberFromUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePhoneNumberFromUserAsync(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result disassociateSigninDelegateGroupsFromAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateSigninDelegateGroupsFromAccount(array{AccountId?: string, GroupNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSigninDelegateGroupsFromAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSigninDelegateGroupsFromAccountAsync(array{AccountId?: string, GroupNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @phpstan-method \Aws\Result getAccount(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getBot(array $args = [])
 * @phpstan-method \Aws\Result getBot(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotAsync(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \Aws\Result getEventsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEventsConfiguration(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventsConfigurationAsync(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \Aws\Result getGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result getGlobalSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result getPhoneNumberOrder(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumberOrder(array{PhoneNumberOrderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array{PhoneNumberOrderId?: string, ...} $args = [])
 * @method \Aws\Result getPhoneNumberSettings(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumberSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getRetentionSettings(array $args = [])
 * @phpstan-method \Aws\Result getRetentionSettings(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRetentionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRetentionSettingsAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getRoom(array $args = [])
 * @phpstan-method \Aws\Result getRoom(array{AccountId?: string, RoomId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoomAsync(array{AccountId?: string, RoomId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result getUserSettings(array $args = [])
 * @phpstan-method \Aws\Result getUserSettings(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserSettingsAsync(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result inviteUsers(array $args = [])
 * @phpstan-method \Aws\Result inviteUsers(array{AccountId?: string, UserEmailList?: list<string>, UserType?: 'PrivateUser'|'SharedDevice', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inviteUsersAsync(array{AccountId?: string, UserEmailList?: list<string>, UserType?: 'PrivateUser'|'SharedDevice', ...} $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAccounts(array{Name?: string, UserEmail?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsAsync(array{Name?: string, UserEmail?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listBots(array $args = [])
 * @phpstan-method \Aws\Result listBots(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotsAsync(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPhoneNumberOrders(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumberOrders(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumbers(array{
 *     Status?: 'AcquireFailed'|'AcquireInProgress'|'Assigned'|'DeleteFailed'|'DeleteInProgress'|'ReleaseFailed'|'ReleaseInProgress'|'Unassigned',
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     FilterName?: 'AccountId'|'SipRuleId'|'UserId'|'VoiceConnectorGroupId'|'VoiceConnectorId',
 *     FilterValue?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array{
 *     Status?: 'AcquireFailed'|'AcquireInProgress'|'Assigned'|'DeleteFailed'|'DeleteInProgress'|'ReleaseFailed'|'ReleaseInProgress'|'Unassigned',
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     FilterName?: 'AccountId'|'SipRuleId'|'UserId'|'VoiceConnectorGroupId'|'VoiceConnectorId',
 *     FilterValue?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRoomMemberships(array $args = [])
 * @phpstan-method \Aws\Result listRoomMemberships(array{AccountId?: string, RoomId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoomMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoomMembershipsAsync(array{AccountId?: string, RoomId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRooms(array $args = [])
 * @phpstan-method \Aws\Result listRooms(array{AccountId?: string, MemberId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoomsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoomsAsync(array{AccountId?: string, MemberId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSupportedPhoneNumberCountries(array $args = [])
 * @phpstan-method \Aws\Result listSupportedPhoneNumberCountries(array{ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array{ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector', ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{
 *     AccountId?: string,
 *     UserEmail?: string,
 *     UserType?: 'PrivateUser'|'SharedDevice',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{
 *     AccountId?: string,
 *     UserEmail?: string,
 *     UserType?: 'PrivateUser'|'SharedDevice',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result logoutUser(array $args = [])
 * @phpstan-method \Aws\Result logoutUser(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise logoutUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise logoutUserAsync(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result putEventsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEventsConfiguration(array{
 *     AccountId?: string,
 *     BotId?: string,
 *     OutboundEventsHTTPSEndpoint?: string,
 *     LambdaFunctionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventsConfigurationAsync(array{
 *     AccountId?: string,
 *     BotId?: string,
 *     OutboundEventsHTTPSEndpoint?: string,
 *     LambdaFunctionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRetentionSettings(array $args = [])
 * @phpstan-method \Aws\Result putRetentionSettings(array{
 *     AccountId?: string,
 *     RetentionSettings?: array{
 *         RoomRetentionSettings?: array{RetentionDays?: int, ...},
 *         ConversationRetentionSettings?: array{RetentionDays?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRetentionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRetentionSettingsAsync(array{
 *     AccountId?: string,
 *     RetentionSettings?: array{
 *         RoomRetentionSettings?: array{RetentionDays?: int, ...},
 *         ConversationRetentionSettings?: array{RetentionDays?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result redactConversationMessage(array $args = [])
 * @phpstan-method \Aws\Result redactConversationMessage(array{AccountId?: string, ConversationId?: string, MessageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise redactConversationMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise redactConversationMessageAsync(array{AccountId?: string, ConversationId?: string, MessageId?: string, ...} $args = [])
 * @method \Aws\Result redactRoomMessage(array $args = [])
 * @phpstan-method \Aws\Result redactRoomMessage(array{AccountId?: string, RoomId?: string, MessageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise redactRoomMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise redactRoomMessageAsync(array{AccountId?: string, RoomId?: string, MessageId?: string, ...} $args = [])
 * @method \Aws\Result regenerateSecurityToken(array $args = [])
 * @phpstan-method \Aws\Result regenerateSecurityToken(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise regenerateSecurityTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise regenerateSecurityTokenAsync(array{AccountId?: string, BotId?: string, ...} $args = [])
 * @method \Aws\Result resetPersonalPIN(array $args = [])
 * @phpstan-method \Aws\Result resetPersonalPIN(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetPersonalPINAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetPersonalPINAsync(array{AccountId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result restorePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result restorePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result searchAvailablePhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result searchAvailablePhoneNumbers(array{
 *     AreaCode?: string,
 *     City?: string,
 *     Country?: string,
 *     State?: string,
 *     TollFreePrefix?: string,
 *     PhoneNumberType?: 'Local'|'TollFree',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array{
 *     AreaCode?: string,
 *     City?: string,
 *     Country?: string,
 *     State?: string,
 *     TollFreePrefix?: string,
 *     PhoneNumberType?: 'Local'|'TollFree',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAccount(array $args = [])
 * @phpstan-method \Aws\Result updateAccount(array{AccountId?: string, Name?: string, DefaultLicense?: 'Basic'|'Plus'|'Pro'|'ProTrial', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountAsync(array{AccountId?: string, Name?: string, DefaultLicense?: 'Basic'|'Plus'|'Pro'|'ProTrial', ...} $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{
 *     AccountId?: string,
 *     AccountSettings?: array{DisableRemoteControl?: bool, EnableDialOut?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{
 *     AccountId?: string,
 *     AccountSettings?: array{DisableRemoteControl?: bool, EnableDialOut?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBot(array $args = [])
 * @phpstan-method \Aws\Result updateBot(array{AccountId?: string, BotId?: string, Disabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotAsync(array{AccountId?: string, BotId?: string, Disabled?: bool, ...} $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalSettings(array{BusinessCalling?: array{CdrBucket?: string, ...}, VoiceConnector?: array{CdrBucket?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array{BusinessCalling?: array{CdrBucket?: string, ...}, VoiceConnector?: array{CdrBucket?: string, ...}, ...} $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumber(array{
 *     PhoneNumberId?: string,
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     CallingName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array{
 *     PhoneNumberId?: string,
 *     ProductType?: 'BusinessCalling'|'SipMediaApplicationDialIn'|'VoiceConnector',
 *     CallingName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePhoneNumberSettings(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumberSettings(array{CallingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array{CallingName?: string, ...} $args = [])
 * @method \Aws\Result updateRoom(array $args = [])
 * @phpstan-method \Aws\Result updateRoom(array{AccountId?: string, RoomId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoomAsync(array{AccountId?: string, RoomId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateRoomMembership(array $args = [])
 * @phpstan-method \Aws\Result updateRoomMembership(array{AccountId?: string, RoomId?: string, MemberId?: string, Role?: 'Administrator'|'Member', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoomMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoomMembershipAsync(array{AccountId?: string, RoomId?: string, MemberId?: string, Role?: 'Administrator'|'Member', ...} $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     AccountId?: string,
 *     UserId?: string,
 *     LicenseType?: 'Basic'|'Plus'|'Pro'|'ProTrial',
 *     UserType?: 'PrivateUser'|'SharedDevice',
 *     AlexaForBusinessMetadata?: array{IsAlexaForBusinessEnabled?: bool, AlexaForBusinessRoomArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     AccountId?: string,
 *     UserId?: string,
 *     LicenseType?: 'Basic'|'Plus'|'Pro'|'ProTrial',
 *     UserType?: 'PrivateUser'|'SharedDevice',
 *     AlexaForBusinessMetadata?: array{IsAlexaForBusinessEnabled?: bool, AlexaForBusinessRoomArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserSettings(array $args = [])
 * @phpstan-method \Aws\Result updateUserSettings(array{
 *     AccountId?: string,
 *     UserId?: string,
 *     UserSettings?: array{Telephony?: array{InboundCalling?: bool, OutboundCalling?: bool, SMS?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserSettingsAsync(array{
 *     AccountId?: string,
 *     UserId?: string,
 *     UserSettings?: array{Telephony?: array{InboundCalling?: bool, OutboundCalling?: bool, SMS?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 */
class ChimeClient extends AwsClient {}
