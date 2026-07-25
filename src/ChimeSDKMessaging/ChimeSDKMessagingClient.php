<?php
namespace Aws\ChimeSDKMessaging;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Messaging** service.
 * @method \Aws\Result associateChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result associateChannelFlow(array{ChannelArn?: string, ChannelFlowArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateChannelFlowAsync(array{ChannelArn?: string, ChannelFlowArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result batchCreateChannelMembership(array $args = [])
 * @phpstan-method \Aws\Result batchCreateChannelMembership(array{
 *     ChannelArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     MemberArns?: list<string>,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateChannelMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateChannelMembershipAsync(array{
 *     ChannelArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     MemberArns?: list<string>,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result channelFlowCallback(array $args = [])
 * @phpstan-method \Aws\Result channelFlowCallback(array{
 *     CallbackId?: string,
 *     ChannelArn?: string,
 *     DeleteResource?: bool,
 *     ChannelMessage?: array{
 *         MessageId?: string,
 *         Content?: string,
 *         Metadata?: string,
 *         PushNotification?: array{Title?: string, Body?: string, Type?: 'DEFAULT'|'VOIP', ...},
 *         MessageAttributes?: array<string, array>,
 *         SubChannelId?: string,
 *         ContentType?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise channelFlowCallbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise channelFlowCallbackAsync(array{
 *     CallbackId?: string,
 *     ChannelArn?: string,
 *     DeleteResource?: bool,
 *     ChannelMessage?: array{
 *         MessageId?: string,
 *         Content?: string,
 *         Metadata?: string,
 *         PushNotification?: array{Title?: string, Body?: string, Type?: 'DEFAULT'|'VOIP', ...},
 *         MessageAttributes?: array<string, array>,
 *         SubChannelId?: string,
 *         ContentType?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     AppInstanceArn?: string,
 *     Name?: string,
 *     Mode?: 'RESTRICTED'|'UNRESTRICTED',
 *     Privacy?: 'PRIVATE'|'PUBLIC',
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChimeBearer?: string,
 *     ChannelId?: string,
 *     MemberArns?: list<string>,
 *     ModeratorArns?: list<string>,
 *     ElasticChannelConfiguration?: array{MaximumSubChannels?: int, TargetMembershipsPerSubChannel?: int, MinimumMembershipPercentage?: int, ...},
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP'|'LAST_MESSAGE_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     AppInstanceArn?: string,
 *     Name?: string,
 *     Mode?: 'RESTRICTED'|'UNRESTRICTED',
 *     Privacy?: 'PRIVATE'|'PUBLIC',
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChimeBearer?: string,
 *     ChannelId?: string,
 *     MemberArns?: list<string>,
 *     ModeratorArns?: list<string>,
 *     ElasticChannelConfiguration?: array{MaximumSubChannels?: int, TargetMembershipsPerSubChannel?: int, MinimumMembershipPercentage?: int, ...},
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP'|'LAST_MESSAGE_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannelBan(array $args = [])
 * @phpstan-method \Aws\Result createChannelBan(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelBanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelBanAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result createChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result createChannelFlow(array{
 *     AppInstanceArn?: string,
 *     Processors?: list<array{Name?: string, Configuration?: array, ExecutionOrder?: int, FallbackAction?: 'ABORT'|'CONTINUE', ...}>,
 *     Name?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelFlowAsync(array{
 *     AppInstanceArn?: string,
 *     Processors?: list<array{Name?: string, Configuration?: array, ExecutionOrder?: int, FallbackAction?: 'ABORT'|'CONTINUE', ...}>,
 *     Name?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannelMembership(array $args = [])
 * @phpstan-method \Aws\Result createChannelMembership(array{
 *     ChannelArn?: string,
 *     MemberArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelMembershipAsync(array{
 *     ChannelArn?: string,
 *     MemberArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannelModerator(array $args = [])
 * @phpstan-method \Aws\Result createChannelModerator(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelModeratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelModeratorAsync(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelBan(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelBan(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelBanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelBanAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelFlow(array{ChannelFlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelFlowAsync(array{ChannelFlowArn?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelMembership(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelMembershipAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelMessage(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelMessage(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelMessageAsync(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelModerator(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelModerator(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelModeratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelModeratorAsync(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result deleteMessagingStreamingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result deleteMessagingStreamingConfigurations(array{AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessagingStreamingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessagingStreamingConfigurationsAsync(array{AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @phpstan-method \Aws\Result describeChannel(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelAsync(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result describeChannelBan(array $args = [])
 * @phpstan-method \Aws\Result describeChannelBan(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelBanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelBanAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result describeChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result describeChannelFlow(array{ChannelFlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelFlowAsync(array{ChannelFlowArn?: string, ...} $args = [])
 * @method \Aws\Result describeChannelMembership(array $args = [])
 * @phpstan-method \Aws\Result describeChannelMembership(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelMembershipAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result describeChannelMembershipForAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result describeChannelMembershipForAppInstanceUser(array{ChannelArn?: string, AppInstanceUserArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipForAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelMembershipForAppInstanceUserAsync(array{ChannelArn?: string, AppInstanceUserArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result describeChannelModeratedByAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result describeChannelModeratedByAppInstanceUser(array{ChannelArn?: string, AppInstanceUserArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratedByAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelModeratedByAppInstanceUserAsync(array{ChannelArn?: string, AppInstanceUserArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result describeChannelModerator(array $args = [])
 * @phpstan-method \Aws\Result describeChannelModerator(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelModeratorAsync(array{ChannelArn?: string, ChannelModeratorArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result disassociateChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result disassociateChannelFlow(array{ChannelArn?: string, ChannelFlowArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateChannelFlowAsync(array{ChannelArn?: string, ChannelFlowArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result getChannelMembershipPreferences(array $args = [])
 * @phpstan-method \Aws\Result getChannelMembershipPreferences(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelMembershipPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelMembershipPreferencesAsync(array{ChannelArn?: string, MemberArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result getChannelMessage(array $args = [])
 * @phpstan-method \Aws\Result getChannelMessage(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelMessageAsync(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result getChannelMessageStatus(array $args = [])
 * @phpstan-method \Aws\Result getChannelMessageStatus(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelMessageStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelMessageStatusAsync(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result getMessagingSessionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getMessagingSessionEndpoint(array{NetworkType?: 'DUAL_STACK'|'IPV4_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessagingSessionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMessagingSessionEndpointAsync(array{NetworkType?: 'DUAL_STACK'|'IPV4_ONLY', ...} $args = [])
 * @method \Aws\Result getMessagingStreamingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result getMessagingStreamingConfigurations(array{AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessagingStreamingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMessagingStreamingConfigurationsAsync(array{AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result listChannelBans(array $args = [])
 * @phpstan-method \Aws\Result listChannelBans(array{ChannelArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelBansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelBansAsync(array{ChannelArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result listChannelFlows(array $args = [])
 * @phpstan-method \Aws\Result listChannelFlows(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelFlowsAsync(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listChannelMemberships(array $args = [])
 * @phpstan-method \Aws\Result listChannelMemberships(array{
 *     ChannelArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelMembershipsAsync(array{
 *     ChannelArn?: string,
 *     Type?: 'DEFAULT'|'HIDDEN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChannelMembershipsForAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result listChannelMembershipsForAppInstanceUser(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsForAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelMembershipsForAppInstanceUserAsync(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result listChannelMessages(array $args = [])
 * @phpstan-method \Aws\Result listChannelMessages(array{
 *     ChannelArn?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     NotBefore?: int|string|\DateTimeInterface,
 *     NotAfter?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelMessagesAsync(array{
 *     ChannelArn?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     NotBefore?: int|string|\DateTimeInterface,
 *     NotAfter?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChannelModerators(array $args = [])
 * @phpstan-method \Aws\Result listChannelModerators(array{ChannelArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelModeratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelModeratorsAsync(array{ChannelArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{
 *     AppInstanceArn?: string,
 *     Privacy?: 'PRIVATE'|'PUBLIC',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{
 *     AppInstanceArn?: string,
 *     Privacy?: 'PRIVATE'|'PUBLIC',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChimeBearer?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChannelsAssociatedWithChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result listChannelsAssociatedWithChannelFlow(array{ChannelFlowArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAssociatedWithChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAssociatedWithChannelFlowAsync(array{ChannelFlowArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listChannelsModeratedByAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result listChannelsModeratedByAppInstanceUser(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsModeratedByAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsModeratedByAppInstanceUserAsync(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ChimeBearer?: string, ...} $args = [])
 * @method \Aws\Result listSubChannels(array $args = [])
 * @phpstan-method \Aws\Result listSubChannels(array{ChannelArn?: string, ChimeBearer?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubChannelsAsync(array{ChannelArn?: string, ChimeBearer?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putChannelExpirationSettings(array $args = [])
 * @phpstan-method \Aws\Result putChannelExpirationSettings(array{
 *     ChannelArn?: string,
 *     ChimeBearer?: string,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP'|'LAST_MESSAGE_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putChannelExpirationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putChannelExpirationSettingsAsync(array{
 *     ChannelArn?: string,
 *     ChimeBearer?: string,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP'|'LAST_MESSAGE_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putChannelMembershipPreferences(array $args = [])
 * @phpstan-method \Aws\Result putChannelMembershipPreferences(array{
 *     ChannelArn?: string,
 *     MemberArn?: string,
 *     ChimeBearer?: string,
 *     Preferences?: array{PushNotifications?: array{AllowNotifications?: 'ALL'|'FILTERED'|'NONE', FilterRule?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putChannelMembershipPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putChannelMembershipPreferencesAsync(array{
 *     ChannelArn?: string,
 *     MemberArn?: string,
 *     ChimeBearer?: string,
 *     Preferences?: array{PushNotifications?: array{AllowNotifications?: 'ALL'|'FILTERED'|'NONE', FilterRule?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMessagingStreamingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result putMessagingStreamingConfigurations(array{
 *     AppInstanceArn?: string,
 *     StreamingConfigurations?: list<array{DataType?: 'Channel'|'ChannelMessage', ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMessagingStreamingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMessagingStreamingConfigurationsAsync(array{
 *     AppInstanceArn?: string,
 *     StreamingConfigurations?: list<array{DataType?: 'Channel'|'ChannelMessage', ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result redactChannelMessage(array $args = [])
 * @phpstan-method \Aws\Result redactChannelMessage(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise redactChannelMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise redactChannelMessageAsync(array{ChannelArn?: string, MessageId?: string, ChimeBearer?: string, SubChannelId?: string, ...} $args = [])
 * @method \Aws\Result searchChannels(array $args = [])
 * @phpstan-method \Aws\Result searchChannels(array{
 *     ChimeBearer?: string,
 *     Fields?: list<array{Key?: 'MEMBERS', Values?: list<string>, Operator?: 'EQUALS'|'INCLUDES', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchChannelsAsync(array{
 *     ChimeBearer?: string,
 *     Fields?: list<array{Key?: 'MEMBERS', Values?: list<string>, Operator?: 'EQUALS'|'INCLUDES', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendChannelMessage(array $args = [])
 * @phpstan-method \Aws\Result sendChannelMessage(array{
 *     ChannelArn?: string,
 *     Content?: string,
 *     Type?: 'CONTROL'|'STANDARD',
 *     Persistence?: 'NON_PERSISTENT'|'PERSISTENT',
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     ChimeBearer?: string,
 *     PushNotification?: array{Title?: string, Body?: string, Type?: 'DEFAULT'|'VOIP', ...},
 *     MessageAttributes?: array<string, array{StringValues?: list<string>, ...}>,
 *     SubChannelId?: string,
 *     ContentType?: string,
 *     Target?: list<array{MemberArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendChannelMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendChannelMessageAsync(array{
 *     ChannelArn?: string,
 *     Content?: string,
 *     Type?: 'CONTROL'|'STANDARD',
 *     Persistence?: 'NON_PERSISTENT'|'PERSISTENT',
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     ChimeBearer?: string,
 *     PushNotification?: array{Title?: string, Body?: string, Type?: 'DEFAULT'|'VOIP', ...},
 *     MessageAttributes?: array<string, array{StringValues?: list<string>, ...}>,
 *     SubChannelId?: string,
 *     ContentType?: string,
 *     Target?: list<array{MemberArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{
 *     ChannelArn?: string,
 *     Name?: string,
 *     Mode?: 'RESTRICTED'|'UNRESTRICTED',
 *     Metadata?: string,
 *     ChimeBearer?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     ChannelArn?: string,
 *     Name?: string,
 *     Mode?: 'RESTRICTED'|'UNRESTRICTED',
 *     Metadata?: string,
 *     ChimeBearer?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannelFlow(array $args = [])
 * @phpstan-method \Aws\Result updateChannelFlow(array{
 *     ChannelFlowArn?: string,
 *     Processors?: list<array{Name?: string, Configuration?: array, ExecutionOrder?: int, FallbackAction?: 'ABORT'|'CONTINUE', ...}>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelFlowAsync(array{
 *     ChannelFlowArn?: string,
 *     Processors?: list<array{Name?: string, Configuration?: array, ExecutionOrder?: int, FallbackAction?: 'ABORT'|'CONTINUE', ...}>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannelMessage(array $args = [])
 * @phpstan-method \Aws\Result updateChannelMessage(array{
 *     ChannelArn?: string,
 *     MessageId?: string,
 *     Content?: string,
 *     Metadata?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ContentType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelMessageAsync(array{
 *     ChannelArn?: string,
 *     MessageId?: string,
 *     Content?: string,
 *     Metadata?: string,
 *     ChimeBearer?: string,
 *     SubChannelId?: string,
 *     ContentType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannelReadMarker(array $args = [])
 * @phpstan-method \Aws\Result updateChannelReadMarker(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelReadMarkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelReadMarkerAsync(array{ChannelArn?: string, ChimeBearer?: string, ...} $args = [])
 */
class ChimeSDKMessagingClient extends AwsClient {}
