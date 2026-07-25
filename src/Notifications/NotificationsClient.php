<?php
namespace Aws\Notifications;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Notifications** service.
 * @method \Aws\Result associateChannel(array $args = [])
 * @phpstan-method \Aws\Result associateChannel(array{arn?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateChannelAsync(array{arn?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result associateManagedNotificationAccountContact(array $args = [])
 * @phpstan-method \Aws\Result associateManagedNotificationAccountContact(array{
 *     contactIdentifier?: 'ACCOUNT_ALTERNATE_BILLING'|'ACCOUNT_ALTERNATE_OPERATIONS'|'ACCOUNT_ALTERNATE_SECURITY'|'ACCOUNT_PRIMARY',
 *     managedNotificationConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateManagedNotificationAccountContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateManagedNotificationAccountContactAsync(array{
 *     contactIdentifier?: 'ACCOUNT_ALTERNATE_BILLING'|'ACCOUNT_ALTERNATE_OPERATIONS'|'ACCOUNT_ALTERNATE_SECURITY'|'ACCOUNT_PRIMARY',
 *     managedNotificationConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateManagedNotificationAdditionalChannel(array $args = [])
 * @phpstan-method \Aws\Result associateManagedNotificationAdditionalChannel(array{channelArn?: string, managedNotificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateManagedNotificationAdditionalChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateManagedNotificationAdditionalChannelAsync(array{channelArn?: string, managedNotificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result associateOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result associateOrganizationalUnit(array{organizationalUnitId?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateOrganizationalUnitAsync(array{organizationalUnitId?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result createEventRule(array $args = [])
 * @phpstan-method \Aws\Result createEventRule(array{
 *     notificationConfigurationArn?: string,
 *     source?: string,
 *     eventType?: string,
 *     eventPattern?: string,
 *     regions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventRuleAsync(array{
 *     notificationConfigurationArn?: string,
 *     source?: string,
 *     eventType?: string,
 *     eventPattern?: string,
 *     regions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createNotificationConfiguration(array{
 *     name?: string,
 *     description?: string,
 *     aggregationDuration?: 'LONG'|'NONE'|'SHORT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationConfigurationAsync(array{
 *     name?: string,
 *     description?: string,
 *     aggregationDuration?: 'LONG'|'NONE'|'SHORT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEventRule(array $args = [])
 * @phpstan-method \Aws\Result deleteEventRule(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventRuleAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deregisterNotificationHub(array $args = [])
 * @phpstan-method \Aws\Result deregisterNotificationHub(array{notificationHubRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterNotificationHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterNotificationHubAsync(array{notificationHubRegion?: string, ...} $args = [])
 * @method \Aws\Result disableNotificationsAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result disableNotificationsAccessForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableNotificationsAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableNotificationsAccessForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result disassociateChannel(array $args = [])
 * @phpstan-method \Aws\Result disassociateChannel(array{arn?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateChannelAsync(array{arn?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateManagedNotificationAccountContact(array $args = [])
 * @phpstan-method \Aws\Result disassociateManagedNotificationAccountContact(array{
 *     contactIdentifier?: 'ACCOUNT_ALTERNATE_BILLING'|'ACCOUNT_ALTERNATE_OPERATIONS'|'ACCOUNT_ALTERNATE_SECURITY'|'ACCOUNT_PRIMARY',
 *     managedNotificationConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateManagedNotificationAccountContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateManagedNotificationAccountContactAsync(array{
 *     contactIdentifier?: 'ACCOUNT_ALTERNATE_BILLING'|'ACCOUNT_ALTERNATE_OPERATIONS'|'ACCOUNT_ALTERNATE_SECURITY'|'ACCOUNT_PRIMARY',
 *     managedNotificationConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateManagedNotificationAdditionalChannel(array $args = [])
 * @phpstan-method \Aws\Result disassociateManagedNotificationAdditionalChannel(array{channelArn?: string, managedNotificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateManagedNotificationAdditionalChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateManagedNotificationAdditionalChannelAsync(array{channelArn?: string, managedNotificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateOrganizationalUnit(array $args = [])
 * @phpstan-method \Aws\Result disassociateOrganizationalUnit(array{organizationalUnitId?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateOrganizationalUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateOrganizationalUnitAsync(array{organizationalUnitId?: string, notificationConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result enableNotificationsAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result enableNotificationsAccessForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableNotificationsAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableNotificationsAccessForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result getEventRule(array $args = [])
 * @phpstan-method \Aws\Result getEventRule(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventRuleAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getManagedNotificationChildEvent(array $args = [])
 * @phpstan-method \Aws\Result getManagedNotificationChildEvent(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedNotificationChildEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedNotificationChildEventAsync(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getManagedNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getManagedNotificationConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedNotificationConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getManagedNotificationEvent(array $args = [])
 * @phpstan-method \Aws\Result getManagedNotificationEvent(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedNotificationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedNotificationEventAsync(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getNotificationConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getNotificationEvent(array $args = [])
 * @phpstan-method \Aws\Result getNotificationEvent(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationEventAsync(array{
 *     arn?: string,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNotificationsAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getNotificationsAccessForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationsAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationsAccessForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEventRules(array $args = [])
 * @phpstan-method \Aws\Result listEventRules(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventRulesAsync(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedNotificationChannelAssociations(array $args = [])
 * @phpstan-method \Aws\Result listManagedNotificationChannelAssociations(array{managedNotificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedNotificationChannelAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedNotificationChannelAssociationsAsync(array{managedNotificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedNotificationChildEvents(array $args = [])
 * @phpstan-method \Aws\Result listManagedNotificationChildEvents(array{
 *     aggregateManagedNotificationEventArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     maxResults?: int,
 *     relatedAccount?: string,
 *     organizationalUnitId?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedNotificationChildEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedNotificationChildEventsAsync(array{
 *     aggregateManagedNotificationEventArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     maxResults?: int,
 *     relatedAccount?: string,
 *     organizationalUnitId?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedNotificationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listManagedNotificationConfigurations(array{channelIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedNotificationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedNotificationConfigurationsAsync(array{channelIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedNotificationEvents(array $args = [])
 * @phpstan-method \Aws\Result listManagedNotificationEvents(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     source?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     organizationalUnitId?: string,
 *     relatedAccount?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedNotificationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedNotificationEventsAsync(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     source?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     organizationalUnitId?: string,
 *     relatedAccount?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMemberAccounts(array $args = [])
 * @phpstan-method \Aws\Result listMemberAccounts(array{
 *     notificationConfigurationArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     memberAccount?: string,
 *     status?: 'ACTIVE'|'CREATING'|'DELETING'|'INACTIVE'|'PENDING',
 *     organizationalUnitId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemberAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemberAccountsAsync(array{
 *     notificationConfigurationArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     memberAccount?: string,
 *     status?: 'ACTIVE'|'CREATING'|'DELETING'|'INACTIVE'|'PENDING',
 *     organizationalUnitId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listNotificationConfigurations(array{
 *     eventRuleSource?: string,
 *     channelArn?: string,
 *     status?: 'ACTIVE'|'DELETING'|'INACTIVE'|'PARTIALLY_ACTIVE',
 *     subtype?: 'ACCOUNT'|'ADMIN_MANAGED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationConfigurationsAsync(array{
 *     eventRuleSource?: string,
 *     channelArn?: string,
 *     status?: 'ACTIVE'|'DELETING'|'INACTIVE'|'PARTIALLY_ACTIVE',
 *     subtype?: 'ACCOUNT'|'ADMIN_MANAGED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationEvents(array $args = [])
 * @phpstan-method \Aws\Result listNotificationEvents(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     source?: string,
 *     includeChildEvents?: bool,
 *     aggregateNotificationEventArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     organizationalUnitId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationEventsAsync(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: 'de_DE'|'en_CA'|'en_UK'|'en_US'|'es_ES'|'fr_CA'|'fr_FR'|'id_ID'|'it_IT'|'ja_JP'|'ko_KR'|'pt_BR'|'tr_TR'|'zh_CN'|'zh_TW',
 *     source?: string,
 *     includeChildEvents?: bool,
 *     aggregateNotificationEventArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     organizationalUnitId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationHubs(array $args = [])
 * @phpstan-method \Aws\Result listNotificationHubs(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationHubsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationHubsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationalUnits(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationalUnits(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationalUnitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationalUnitsAsync(array{notificationConfigurationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result registerNotificationHub(array $args = [])
 * @phpstan-method \Aws\Result registerNotificationHub(array{notificationHubRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerNotificationHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerNotificationHubAsync(array{notificationHubRegion?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEventRule(array $args = [])
 * @phpstan-method \Aws\Result updateEventRule(array{arn?: string, eventPattern?: string, regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventRuleAsync(array{arn?: string, eventPattern?: string, regions?: list<string>, ...} $args = [])
 * @method \Aws\Result updateNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationConfiguration(array{arn?: string, name?: string, description?: string, aggregationDuration?: 'LONG'|'NONE'|'SHORT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array{arn?: string, name?: string, description?: string, aggregationDuration?: 'LONG'|'NONE'|'SHORT', ...} $args = [])
 */
class NotificationsClient extends AwsClient {}
