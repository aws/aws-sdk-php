<?php
namespace Aws\Chatbot;

use Aws\AwsClient;

/**
 * This client is used to interact with the **chatbot** service.
 * @method \Aws\Result associateToConfiguration(array $args = [])
 * @phpstan-method \Aws\Result associateToConfiguration(array{Resource?: string, ChatConfiguration?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateToConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateToConfigurationAsync(array{Resource?: string, ChatConfiguration?: string, ...} $args = [])
 * @method \Aws\Result createChimeWebhookConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createChimeWebhookConfiguration(array{
 *     WebhookDescription?: string,
 *     WebhookUrl?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChimeWebhookConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChimeWebhookConfigurationAsync(array{
 *     WebhookDescription?: string,
 *     WebhookUrl?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomAction(array $args = [])
 * @phpstan-method \Aws\Result createCustomAction(array{
 *     Definition?: array{CommandText?: string, ...},
 *     AliasName?: string,
 *     Attachments?: list<array{
 *         NotificationType?: string,
 *         ButtonText?: string,
 *         Criteria?: list<array>,
 *         Variables?: array<string, string>,
 *         ...,
 *     }>,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ClientToken?: string,
 *     ActionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomActionAsync(array{
 *     Definition?: array{CommandText?: string, ...},
 *     AliasName?: string,
 *     Attachments?: list<array{
 *         NotificationType?: string,
 *         ButtonText?: string,
 *         Criteria?: list<array>,
 *         Variables?: array<string, string>,
 *         ...,
 *     }>,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ClientToken?: string,
 *     ActionName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMicrosoftTeamsChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createMicrosoftTeamsChannelConfiguration(array{
 *     ChannelId?: string,
 *     ChannelName?: string,
 *     TeamId?: string,
 *     TeamName?: string,
 *     TenantId?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrosoftTeamsChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMicrosoftTeamsChannelConfigurationAsync(array{
 *     ChannelId?: string,
 *     ChannelName?: string,
 *     TeamId?: string,
 *     TeamName?: string,
 *     TenantId?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSlackChannelConfiguration(array{
 *     SlackTeamId?: string,
 *     SlackChannelId?: string,
 *     SlackChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSlackChannelConfigurationAsync(array{
 *     SlackTeamId?: string,
 *     SlackChannelId?: string,
 *     SlackChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     ConfigurationName?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChimeWebhookConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteChimeWebhookConfiguration(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChimeWebhookConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChimeWebhookConfigurationAsync(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomAction(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomAction(array{CustomActionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomActionAsync(array{CustomActionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteMicrosoftTeamsChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteMicrosoftTeamsChannelConfiguration(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsChannelConfigurationAsync(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteMicrosoftTeamsConfiguredTeam(array $args = [])
 * @phpstan-method \Aws\Result deleteMicrosoftTeamsConfiguredTeam(array{TeamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsConfiguredTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsConfiguredTeamAsync(array{TeamId?: string, ...} $args = [])
 * @method \Aws\Result deleteMicrosoftTeamsUserIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteMicrosoftTeamsUserIdentity(array{ChatConfigurationArn?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsUserIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMicrosoftTeamsUserIdentityAsync(array{ChatConfigurationArn?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result deleteSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSlackChannelConfiguration(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlackChannelConfigurationAsync(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSlackUserIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteSlackUserIdentity(array{ChatConfigurationArn?: string, SlackTeamId?: string, SlackUserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlackUserIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlackUserIdentityAsync(array{ChatConfigurationArn?: string, SlackTeamId?: string, SlackUserId?: string, ...} $args = [])
 * @method \Aws\Result deleteSlackWorkspaceAuthorization(array $args = [])
 * @phpstan-method \Aws\Result deleteSlackWorkspaceAuthorization(array{SlackTeamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlackWorkspaceAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlackWorkspaceAuthorizationAsync(array{SlackTeamId?: string, ...} $args = [])
 * @method \Aws\Result describeChimeWebhookConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeChimeWebhookConfigurations(array{MaxResults?: int, NextToken?: string, ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChimeWebhookConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChimeWebhookConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result describeSlackChannelConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeSlackChannelConfigurations(array{MaxResults?: int, NextToken?: string, ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSlackChannelConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSlackChannelConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result describeSlackUserIdentities(array $args = [])
 * @phpstan-method \Aws\Result describeSlackUserIdentities(array{ChatConfigurationArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSlackUserIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSlackUserIdentitiesAsync(array{ChatConfigurationArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeSlackWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result describeSlackWorkspaces(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSlackWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSlackWorkspacesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateFromConfiguration(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromConfiguration(array{Resource?: string, ChatConfiguration?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromConfigurationAsync(array{Resource?: string, ChatConfiguration?: string, ...} $args = [])
 * @method \Aws\Result getAccountPreferences(array $args = [])
 * @phpstan-method \Aws\Result getAccountPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result getCustomAction(array $args = [])
 * @phpstan-method \Aws\Result getCustomAction(array{CustomActionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomActionAsync(array{CustomActionArn?: string, ...} $args = [])
 * @method \Aws\Result getMicrosoftTeamsChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getMicrosoftTeamsChannelConfiguration(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMicrosoftTeamsChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMicrosoftTeamsChannelConfigurationAsync(array{ChatConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssociations(array{ChatConfiguration?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationsAsync(array{ChatConfiguration?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomActions(array $args = [])
 * @phpstan-method \Aws\Result listCustomActions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomActionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMicrosoftTeamsChannelConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listMicrosoftTeamsChannelConfigurations(array{MaxResults?: int, NextToken?: string, TeamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrosoftTeamsChannelConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrosoftTeamsChannelConfigurationsAsync(array{MaxResults?: int, NextToken?: string, TeamId?: string, ...} $args = [])
 * @method \Aws\Result listMicrosoftTeamsConfiguredTeams(array $args = [])
 * @phpstan-method \Aws\Result listMicrosoftTeamsConfiguredTeams(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrosoftTeamsConfiguredTeamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrosoftTeamsConfiguredTeamsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMicrosoftTeamsUserIdentities(array $args = [])
 * @phpstan-method \Aws\Result listMicrosoftTeamsUserIdentities(array{ChatConfigurationArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrosoftTeamsUserIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrosoftTeamsUserIdentitiesAsync(array{ChatConfigurationArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{TagKey?: string, TagValue?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{TagKey?: string, TagValue?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountPreferences(array $args = [])
 * @phpstan-method \Aws\Result updateAccountPreferences(array{UserAuthorizationRequired?: bool, TrainingDataCollectionEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountPreferencesAsync(array{UserAuthorizationRequired?: bool, TrainingDataCollectionEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateChimeWebhookConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateChimeWebhookConfiguration(array{
 *     ChatConfigurationArn?: string,
 *     WebhookDescription?: string,
 *     WebhookUrl?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChimeWebhookConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChimeWebhookConfigurationAsync(array{
 *     ChatConfigurationArn?: string,
 *     WebhookDescription?: string,
 *     WebhookUrl?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomAction(array $args = [])
 * @phpstan-method \Aws\Result updateCustomAction(array{
 *     CustomActionArn?: string,
 *     Definition?: array{CommandText?: string, ...},
 *     AliasName?: string,
 *     Attachments?: list<array{
 *         NotificationType?: string,
 *         ButtonText?: string,
 *         Criteria?: list<array>,
 *         Variables?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomActionAsync(array{
 *     CustomActionArn?: string,
 *     Definition?: array{CommandText?: string, ...},
 *     AliasName?: string,
 *     Attachments?: list<array{
 *         NotificationType?: string,
 *         ButtonText?: string,
 *         Criteria?: list<array>,
 *         Variables?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMicrosoftTeamsChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateMicrosoftTeamsChannelConfiguration(array{
 *     ChatConfigurationArn?: string,
 *     ChannelId?: string,
 *     ChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMicrosoftTeamsChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMicrosoftTeamsChannelConfigurationAsync(array{
 *     ChatConfigurationArn?: string,
 *     ChannelId?: string,
 *     ChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSlackChannelConfiguration(array{
 *     ChatConfigurationArn?: string,
 *     SlackChannelId?: string,
 *     SlackChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSlackChannelConfigurationAsync(array{
 *     ChatConfigurationArn?: string,
 *     SlackChannelId?: string,
 *     SlackChannelName?: string,
 *     SnsTopicArns?: list<string>,
 *     IamRoleArn?: string,
 *     LoggingLevel?: string,
 *     GuardrailPolicyArns?: list<string>,
 *     UserAuthorizationRequired?: bool,
 *     ...,
 * } $args = [])
 */
class ChatbotClient extends AwsClient {}
