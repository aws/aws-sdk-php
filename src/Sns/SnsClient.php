<?php
namespace Aws\Sns;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Simple Notification Service (Amazon SNS)**.
 *
 * @method \Aws\Result addPermission(array $args = [])
 * @phpstan-method \Aws\Result addPermission(array{TopicArn?: string, Label?: string, AWSAccountId?: list<string>, ActionName?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPermissionAsync(array{TopicArn?: string, Label?: string, AWSAccountId?: list<string>, ActionName?: list<string>, ...} $args = [])
 * @method \Aws\Result checkIfPhoneNumberIsOptedOut(array $args = [])
 * @phpstan-method \Aws\Result checkIfPhoneNumberIsOptedOut(array{phoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkIfPhoneNumberIsOptedOutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkIfPhoneNumberIsOptedOutAsync(array{phoneNumber?: string, ...} $args = [])
 * @method \Aws\Result confirmSubscription(array $args = [])
 * @phpstan-method \Aws\Result confirmSubscription(array{TopicArn?: string, Token?: string, AuthenticateOnUnsubscribe?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmSubscriptionAsync(array{TopicArn?: string, Token?: string, AuthenticateOnUnsubscribe?: string, ...} $args = [])
 * @method \Aws\Result createPlatformApplication(array $args = [])
 * @phpstan-method \Aws\Result createPlatformApplication(array{Name?: string, Platform?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlatformApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlatformApplicationAsync(array{Name?: string, Platform?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createPlatformEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createPlatformEndpoint(array{
 *     PlatformApplicationArn?: string,
 *     Token?: string,
 *     CustomUserData?: string,
 *     Attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlatformEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlatformEndpointAsync(array{
 *     PlatformApplicationArn?: string,
 *     Token?: string,
 *     CustomUserData?: string,
 *     Attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSMSSandboxPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result createSMSSandboxPhoneNumber(array{
 *     PhoneNumber?: string,
 *     LanguageCode?: 'de-DE'|'en-GB'|'en-US'|'es-419'|'es-ES'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'kr-KR'|'pt-BR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSMSSandboxPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSMSSandboxPhoneNumberAsync(array{
 *     PhoneNumber?: string,
 *     LanguageCode?: 'de-DE'|'en-GB'|'en-US'|'es-419'|'es-ES'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'kr-KR'|'pt-BR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTopic(array $args = [])
 * @phpstan-method \Aws\Result createTopic(array{
 *     Name?: string,
 *     Attributes?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataProtectionPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicAsync(array{
 *     Name?: string,
 *     Attributes?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataProtectionPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result deletePlatformApplication(array $args = [])
 * @phpstan-method \Aws\Result deletePlatformApplication(array{PlatformApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlatformApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlatformApplicationAsync(array{PlatformApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSMSSandboxPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result deleteSMSSandboxPhoneNumber(array{PhoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSMSSandboxPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSMSSandboxPhoneNumberAsync(array{PhoneNumber?: string, ...} $args = [])
 * @method \Aws\Result deleteTopic(array $args = [])
 * @phpstan-method \Aws\Result deleteTopic(array{TopicArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicAsync(array{TopicArn?: string, ...} $args = [])
 * @method \Aws\Result getDataProtectionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDataProtectionPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataProtectionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataProtectionPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getEndpointAttributes(array $args = [])
 * @phpstan-method \Aws\Result getEndpointAttributes(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEndpointAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEndpointAttributesAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result getPlatformApplicationAttributes(array $args = [])
 * @phpstan-method \Aws\Result getPlatformApplicationAttributes(array{PlatformApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlatformApplicationAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlatformApplicationAttributesAsync(array{PlatformApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result getSMSAttributes(array $args = [])
 * @phpstan-method \Aws\Result getSMSAttributes(array{attributes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSMSAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSMSAttributesAsync(array{attributes?: list<string>, ...} $args = [])
 * @method \Aws\Result getSMSSandboxAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result getSMSSandboxAccountStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSMSSandboxAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSMSSandboxAccountStatusAsync(array{...} $args = [])
 * @method \Aws\Result getSubscriptionAttributes(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionAttributes(array{SubscriptionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionAttributesAsync(array{SubscriptionArn?: string, ...} $args = [])
 * @method \Aws\Result getTopicAttributes(array $args = [])
 * @phpstan-method \Aws\Result getTopicAttributes(array{TopicArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTopicAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTopicAttributesAsync(array{TopicArn?: string, ...} $args = [])
 * @method \Aws\Result listEndpointsByPlatformApplication(array $args = [])
 * @phpstan-method \Aws\Result listEndpointsByPlatformApplication(array{PlatformApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsByPlatformApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointsByPlatformApplicationAsync(array{PlatformApplicationArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOriginationNumbers(array $args = [])
 * @phpstan-method \Aws\Result listOriginationNumbers(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOriginationNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOriginationNumbersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPhoneNumbersOptedOut(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumbersOptedOut(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersOptedOutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumbersOptedOutAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPlatformApplications(array $args = [])
 * @phpstan-method \Aws\Result listPlatformApplications(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlatformApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlatformApplicationsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSMSSandboxPhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result listSMSSandboxPhoneNumbers(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSMSSandboxPhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSMSSandboxPhoneNumbersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptions(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSubscriptionsByTopic(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionsByTopic(array{TopicArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsByTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsByTopicAsync(array{TopicArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTopics(array $args = [])
 * @phpstan-method \Aws\Result listTopics(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result optInPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result optInPhoneNumber(array{phoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise optInPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise optInPhoneNumberAsync(array{phoneNumber?: string, ...} $args = [])
 * @method \Aws\Result publish(array $args = [])
 * @phpstan-method \Aws\Result publish(array{
 *     TopicArn?: string,
 *     TargetArn?: string,
 *     PhoneNumber?: string,
 *     Message?: string,
 *     Subject?: string,
 *     MessageStructure?: string,
 *     MessageAttributes?: array<string, array{
 *         DataType?: string,
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     }>,
 *     MessageDeduplicationId?: string,
 *     MessageGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishAsync(array{
 *     TopicArn?: string,
 *     TargetArn?: string,
 *     PhoneNumber?: string,
 *     Message?: string,
 *     Subject?: string,
 *     MessageStructure?: string,
 *     MessageAttributes?: array<string, array{
 *         DataType?: string,
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     }>,
 *     MessageDeduplicationId?: string,
 *     MessageGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result publishBatch(array $args = [])
 * @phpstan-method \Aws\Result publishBatch(array{
 *     TopicArn?: string,
 *     PublishBatchRequestEntries?: list<array{
 *         Id?: string,
 *         Message?: string,
 *         Subject?: string,
 *         MessageStructure?: string,
 *         MessageAttributes?: array<string, array>,
 *         MessageDeduplicationId?: string,
 *         MessageGroupId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishBatchAsync(array{
 *     TopicArn?: string,
 *     PublishBatchRequestEntries?: list<array{
 *         Id?: string,
 *         Message?: string,
 *         Subject?: string,
 *         MessageStructure?: string,
 *         MessageAttributes?: array<string, array>,
 *         MessageDeduplicationId?: string,
 *         MessageGroupId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataProtectionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putDataProtectionPolicy(array{ResourceArn?: string, DataProtectionPolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataProtectionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataProtectionPolicyAsync(array{ResourceArn?: string, DataProtectionPolicy?: string, ...} $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @phpstan-method \Aws\Result removePermission(array{TopicArn?: string, Label?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePermissionAsync(array{TopicArn?: string, Label?: string, ...} $args = [])
 * @method \Aws\Result setEndpointAttributes(array $args = [])
 * @phpstan-method \Aws\Result setEndpointAttributes(array{EndpointArn?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setEndpointAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setEndpointAttributesAsync(array{EndpointArn?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result setPlatformApplicationAttributes(array $args = [])
 * @phpstan-method \Aws\Result setPlatformApplicationAttributes(array{PlatformApplicationArn?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setPlatformApplicationAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setPlatformApplicationAttributesAsync(array{PlatformApplicationArn?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result setSMSAttributes(array $args = [])
 * @phpstan-method \Aws\Result setSMSAttributes(array{attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setSMSAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSMSAttributesAsync(array{attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result setSubscriptionAttributes(array $args = [])
 * @phpstan-method \Aws\Result setSubscriptionAttributes(array{SubscriptionArn?: string, AttributeName?: string, AttributeValue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setSubscriptionAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSubscriptionAttributesAsync(array{SubscriptionArn?: string, AttributeName?: string, AttributeValue?: string, ...} $args = [])
 * @method \Aws\Result setTopicAttributes(array $args = [])
 * @phpstan-method \Aws\Result setTopicAttributes(array{TopicArn?: string, AttributeName?: string, AttributeValue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setTopicAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTopicAttributesAsync(array{TopicArn?: string, AttributeName?: string, AttributeValue?: string, ...} $args = [])
 * @method \Aws\Result subscribe(array $args = [])
 * @phpstan-method \Aws\Result subscribe(array{
 *     TopicArn?: string,
 *     Protocol?: string,
 *     Endpoint?: string,
 *     Attributes?: array<string, string>,
 *     ReturnSubscriptionArn?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise subscribeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise subscribeAsync(array{
 *     TopicArn?: string,
 *     Protocol?: string,
 *     Endpoint?: string,
 *     Attributes?: array<string, string>,
 *     ReturnSubscriptionArn?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result unsubscribe(array $args = [])
 * @phpstan-method \Aws\Result unsubscribe(array{SubscriptionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unsubscribeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unsubscribeAsync(array{SubscriptionArn?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result verifySMSSandboxPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result verifySMSSandboxPhoneNumber(array{PhoneNumber?: string, OneTimePassword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifySMSSandboxPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifySMSSandboxPhoneNumberAsync(array{PhoneNumber?: string, OneTimePassword?: string, ...} $args = [])
 */
class SnsClient extends AwsClient {}
