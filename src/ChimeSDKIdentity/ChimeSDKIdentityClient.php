<?php
namespace Aws\ChimeSDKIdentity;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Identity** service.
 * @method \Aws\Result createAppInstance(array $args = [])
 * @phpstan-method \Aws\Result createAppInstance(array{
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppInstanceAsync(array{
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppInstanceAdmin(array $args = [])
 * @phpstan-method \Aws\Result createAppInstanceAdmin(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppInstanceAdminAsync(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result createAppInstanceBot(array $args = [])
 * @phpstan-method \Aws\Result createAppInstanceBot(array{
 *     AppInstanceArn?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Configuration?: array{
 *         Lex?: array{
 *             RespondsTo?: 'STANDARD_MESSAGES',
 *             InvokedBy?: array,
 *             LexBotAliasArn?: string,
 *             LocaleId?: string,
 *             WelcomeIntent?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppInstanceBotAsync(array{
 *     AppInstanceArn?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Configuration?: array{
 *         Lex?: array{
 *             RespondsTo?: 'STANDARD_MESSAGES',
 *             InvokedBy?: array,
 *             LexBotAliasArn?: string,
 *             LocaleId?: string,
 *             WelcomeIntent?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result createAppInstanceUser(array{
 *     AppInstanceArn?: string,
 *     AppInstanceUserId?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppInstanceUserAsync(array{
 *     AppInstanceArn?: string,
 *     AppInstanceUserId?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAppInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteAppInstance(array{AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppInstanceAsync(array{AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAppInstanceAdmin(array $args = [])
 * @phpstan-method \Aws\Result deleteAppInstanceAdmin(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppInstanceAdminAsync(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAppInstanceBot(array $args = [])
 * @phpstan-method \Aws\Result deleteAppInstanceBot(array{AppInstanceBotArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppInstanceBotAsync(array{AppInstanceBotArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result deleteAppInstanceUser(array{AppInstanceUserArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppInstanceUserAsync(array{AppInstanceUserArn?: string, ...} $args = [])
 * @method \Aws\Result deregisterAppInstanceUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deregisterAppInstanceUserEndpoint(array{AppInstanceUserArn?: string, EndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterAppInstanceUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterAppInstanceUserEndpointAsync(array{AppInstanceUserArn?: string, EndpointId?: string, ...} $args = [])
 * @method \Aws\Result describeAppInstance(array $args = [])
 * @phpstan-method \Aws\Result describeAppInstance(array{AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppInstanceAsync(array{AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppInstanceAdmin(array $args = [])
 * @phpstan-method \Aws\Result describeAppInstanceAdmin(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppInstanceAdminAsync(array{AppInstanceAdminArn?: string, AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppInstanceBot(array $args = [])
 * @phpstan-method \Aws\Result describeAppInstanceBot(array{AppInstanceBotArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppInstanceBotAsync(array{AppInstanceBotArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result describeAppInstanceUser(array{AppInstanceUserArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppInstanceUserAsync(array{AppInstanceUserArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppInstanceUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeAppInstanceUserEndpoint(array{AppInstanceUserArn?: string, EndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppInstanceUserEndpointAsync(array{AppInstanceUserArn?: string, EndpointId?: string, ...} $args = [])
 * @method \Aws\Result getAppInstanceRetentionSettings(array $args = [])
 * @phpstan-method \Aws\Result getAppInstanceRetentionSettings(array{AppInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppInstanceRetentionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppInstanceRetentionSettingsAsync(array{AppInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result listAppInstanceAdmins(array $args = [])
 * @phpstan-method \Aws\Result listAppInstanceAdmins(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceAdminsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInstanceAdminsAsync(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppInstanceBots(array $args = [])
 * @phpstan-method \Aws\Result listAppInstanceBots(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInstanceBotsAsync(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppInstanceUserEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listAppInstanceUserEndpoints(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceUserEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInstanceUserEndpointsAsync(array{AppInstanceUserArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppInstanceUsers(array $args = [])
 * @phpstan-method \Aws\Result listAppInstanceUsers(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInstanceUsersAsync(array{AppInstanceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppInstances(array $args = [])
 * @phpstan-method \Aws\Result listAppInstances(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInstancesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putAppInstanceRetentionSettings(array $args = [])
 * @phpstan-method \Aws\Result putAppInstanceRetentionSettings(array{
 *     AppInstanceArn?: string,
 *     AppInstanceRetentionSettings?: array{ChannelRetentionSettings?: array{RetentionDays?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceRetentionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAppInstanceRetentionSettingsAsync(array{
 *     AppInstanceArn?: string,
 *     AppInstanceRetentionSettings?: array{ChannelRetentionSettings?: array{RetentionDays?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAppInstanceUserExpirationSettings(array $args = [])
 * @phpstan-method \Aws\Result putAppInstanceUserExpirationSettings(array{
 *     AppInstanceUserArn?: string,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceUserExpirationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAppInstanceUserExpirationSettingsAsync(array{
 *     AppInstanceUserArn?: string,
 *     ExpirationSettings?: array{ExpirationDays?: int, ExpirationCriterion?: 'CREATED_TIMESTAMP', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerAppInstanceUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result registerAppInstanceUserEndpoint(array{
 *     AppInstanceUserArn?: string,
 *     Name?: string,
 *     Type?: 'APNS'|'APNS_SANDBOX'|'GCM',
 *     ResourceArn?: string,
 *     EndpointAttributes?: array{DeviceToken?: string, VoipDeviceToken?: string, ...},
 *     ClientRequestToken?: string,
 *     AllowMessages?: 'ALL'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAppInstanceUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAppInstanceUserEndpointAsync(array{
 *     AppInstanceUserArn?: string,
 *     Name?: string,
 *     Type?: 'APNS'|'APNS_SANDBOX'|'GCM',
 *     ResourceArn?: string,
 *     EndpointAttributes?: array{DeviceToken?: string, VoipDeviceToken?: string, ...},
 *     ClientRequestToken?: string,
 *     AllowMessages?: 'ALL'|'NONE',
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
 * @method \Aws\Result updateAppInstance(array $args = [])
 * @phpstan-method \Aws\Result updateAppInstance(array{AppInstanceArn?: string, Name?: string, Metadata?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppInstanceAsync(array{AppInstanceArn?: string, Name?: string, Metadata?: string, ...} $args = [])
 * @method \Aws\Result updateAppInstanceBot(array $args = [])
 * @phpstan-method \Aws\Result updateAppInstanceBot(array{
 *     AppInstanceBotArn?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     Configuration?: array{
 *         Lex?: array{
 *             RespondsTo?: 'STANDARD_MESSAGES',
 *             InvokedBy?: array,
 *             LexBotAliasArn?: string,
 *             LocaleId?: string,
 *             WelcomeIntent?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppInstanceBotAsync(array{
 *     AppInstanceBotArn?: string,
 *     Name?: string,
 *     Metadata?: string,
 *     Configuration?: array{
 *         Lex?: array{
 *             RespondsTo?: 'STANDARD_MESSAGES',
 *             InvokedBy?: array,
 *             LexBotAliasArn?: string,
 *             LocaleId?: string,
 *             WelcomeIntent?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAppInstanceUser(array $args = [])
 * @phpstan-method \Aws\Result updateAppInstanceUser(array{AppInstanceUserArn?: string, Name?: string, Metadata?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppInstanceUserAsync(array{AppInstanceUserArn?: string, Name?: string, Metadata?: string, ...} $args = [])
 * @method \Aws\Result updateAppInstanceUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateAppInstanceUserEndpoint(array{AppInstanceUserArn?: string, EndpointId?: string, Name?: string, AllowMessages?: 'ALL'|'NONE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppInstanceUserEndpointAsync(array{AppInstanceUserArn?: string, EndpointId?: string, Name?: string, AllowMessages?: 'ALL'|'NONE', ...} $args = [])
 */
class ChimeSDKIdentityClient extends AwsClient {}
