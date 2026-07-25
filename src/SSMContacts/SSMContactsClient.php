<?php
namespace Aws\SSMContacts;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager Incident Manager Contacts** service.
 * @method \Aws\Result acceptPage(array $args = [])
 * @phpstan-method \Aws\Result acceptPage(array{
 *     PageId?: string,
 *     ContactChannelId?: string,
 *     AcceptType?: 'DELIVERED'|'READ',
 *     Note?: string,
 *     AcceptCode?: string,
 *     AcceptCodeValidation?: 'ENFORCE'|'IGNORE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptPageAsync(array{
 *     PageId?: string,
 *     ContactChannelId?: string,
 *     AcceptType?: 'DELIVERED'|'READ',
 *     Note?: string,
 *     AcceptCode?: string,
 *     AcceptCodeValidation?: 'ENFORCE'|'IGNORE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result activateContactChannel(array $args = [])
 * @phpstan-method \Aws\Result activateContactChannel(array{ContactChannelId?: string, ActivationCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateContactChannelAsync(array{ContactChannelId?: string, ActivationCode?: string, ...} $args = [])
 * @method \Aws\Result createContact(array $args = [])
 * @phpstan-method \Aws\Result createContact(array{
 *     Alias?: string,
 *     DisplayName?: string,
 *     Type?: 'ESCALATION'|'ONCALL_SCHEDULE'|'PERSONAL',
 *     Plan?: array{Stages?: list<array>, RotationIds?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactAsync(array{
 *     Alias?: string,
 *     DisplayName?: string,
 *     Type?: 'ESCALATION'|'ONCALL_SCHEDULE'|'PERSONAL',
 *     Plan?: array{Stages?: list<array>, RotationIds?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactChannel(array $args = [])
 * @phpstan-method \Aws\Result createContactChannel(array{
 *     ContactId?: string,
 *     Name?: string,
 *     Type?: 'EMAIL'|'SMS'|'VOICE',
 *     DeliveryAddress?: array{SimpleAddress?: string, ...},
 *     DeferActivation?: bool,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactChannelAsync(array{
 *     ContactId?: string,
 *     Name?: string,
 *     Type?: 'EMAIL'|'SMS'|'VOICE',
 *     DeliveryAddress?: array{SimpleAddress?: string, ...},
 *     DeferActivation?: bool,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRotation(array $args = [])
 * @phpstan-method \Aws\Result createRotation(array{
 *     Name?: string,
 *     ContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRotationAsync(array{
 *     Name?: string,
 *     ContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRotationOverride(array $args = [])
 * @phpstan-method \Aws\Result createRotationOverride(array{
 *     RotationId?: string,
 *     NewContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRotationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRotationOverrideAsync(array{
 *     RotationId?: string,
 *     NewContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateContactChannel(array $args = [])
 * @phpstan-method \Aws\Result deactivateContactChannel(array{ContactChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateContactChannelAsync(array{ContactChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteContact(array $args = [])
 * @phpstan-method \Aws\Result deleteContact(array{ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactAsync(array{ContactId?: string, ...} $args = [])
 * @method \Aws\Result deleteContactChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteContactChannel(array{ContactChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactChannelAsync(array{ContactChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteRotation(array $args = [])
 * @phpstan-method \Aws\Result deleteRotation(array{RotationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRotationAsync(array{RotationId?: string, ...} $args = [])
 * @method \Aws\Result deleteRotationOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteRotationOverride(array{RotationId?: string, RotationOverrideId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRotationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRotationOverrideAsync(array{RotationId?: string, RotationOverrideId?: string, ...} $args = [])
 * @method \Aws\Result describeEngagement(array $args = [])
 * @phpstan-method \Aws\Result describeEngagement(array{EngagementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngagementAsync(array{EngagementId?: string, ...} $args = [])
 * @method \Aws\Result describePage(array $args = [])
 * @phpstan-method \Aws\Result describePage(array{PageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePageAsync(array{PageId?: string, ...} $args = [])
 * @method \Aws\Result getContact(array $args = [])
 * @phpstan-method \Aws\Result getContact(array{ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactAsync(array{ContactId?: string, ...} $args = [])
 * @method \Aws\Result getContactChannel(array $args = [])
 * @phpstan-method \Aws\Result getContactChannel(array{ContactChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactChannelAsync(array{ContactChannelId?: string, ...} $args = [])
 * @method \Aws\Result getContactPolicy(array $args = [])
 * @phpstan-method \Aws\Result getContactPolicy(array{ContactArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactPolicyAsync(array{ContactArn?: string, ...} $args = [])
 * @method \Aws\Result getRotation(array $args = [])
 * @phpstan-method \Aws\Result getRotation(array{RotationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRotationAsync(array{RotationId?: string, ...} $args = [])
 * @method \Aws\Result getRotationOverride(array $args = [])
 * @phpstan-method \Aws\Result getRotationOverride(array{RotationId?: string, RotationOverrideId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRotationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRotationOverrideAsync(array{RotationId?: string, RotationOverrideId?: string, ...} $args = [])
 * @method \Aws\Result listContactChannels(array $args = [])
 * @phpstan-method \Aws\Result listContactChannels(array{ContactId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactChannelsAsync(array{ContactId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @phpstan-method \Aws\Result listContacts(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AliasPrefix?: string,
 *     Type?: 'ESCALATION'|'ONCALL_SCHEDULE'|'PERSONAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AliasPrefix?: string,
 *     Type?: 'ESCALATION'|'ONCALL_SCHEDULE'|'PERSONAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEngagements(array $args = [])
 * @phpstan-method \Aws\Result listEngagements(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IncidentId?: string,
 *     TimeRangeValue?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IncidentId?: string,
 *     TimeRangeValue?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPageReceipts(array $args = [])
 * @phpstan-method \Aws\Result listPageReceipts(array{PageId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPageReceiptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPageReceiptsAsync(array{PageId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPageResolutions(array $args = [])
 * @phpstan-method \Aws\Result listPageResolutions(array{NextToken?: string, PageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPageResolutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPageResolutionsAsync(array{NextToken?: string, PageId?: string, ...} $args = [])
 * @method \Aws\Result listPagesByContact(array $args = [])
 * @phpstan-method \Aws\Result listPagesByContact(array{ContactId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPagesByContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPagesByContactAsync(array{ContactId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPagesByEngagement(array $args = [])
 * @phpstan-method \Aws\Result listPagesByEngagement(array{EngagementId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPagesByEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPagesByEngagementAsync(array{EngagementId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPreviewRotationShifts(array $args = [])
 * @phpstan-method \Aws\Result listPreviewRotationShifts(array{
 *     RotationStartTime?: int|string|\DateTimeInterface,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Members?: list<string>,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     Overrides?: list<array{
 *         NewMembers?: list<string>,
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPreviewRotationShiftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPreviewRotationShiftsAsync(array{
 *     RotationStartTime?: int|string|\DateTimeInterface,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Members?: list<string>,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     Overrides?: list<array{
 *         NewMembers?: list<string>,
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRotationOverrides(array $args = [])
 * @phpstan-method \Aws\Result listRotationOverrides(array{
 *     RotationId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationOverridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRotationOverridesAsync(array{
 *     RotationId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRotationShifts(array $args = [])
 * @phpstan-method \Aws\Result listRotationShifts(array{
 *     RotationId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationShiftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRotationShiftsAsync(array{
 *     RotationId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRotations(array $args = [])
 * @phpstan-method \Aws\Result listRotations(array{RotationNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRotationsAsync(array{RotationNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putContactPolicy(array $args = [])
 * @phpstan-method \Aws\Result putContactPolicy(array{ContactArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putContactPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putContactPolicyAsync(array{ContactArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result sendActivationCode(array $args = [])
 * @phpstan-method \Aws\Result sendActivationCode(array{ContactChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendActivationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendActivationCodeAsync(array{ContactChannelId?: string, ...} $args = [])
 * @method \Aws\Result startEngagement(array $args = [])
 * @phpstan-method \Aws\Result startEngagement(array{
 *     ContactId?: string,
 *     Sender?: string,
 *     Subject?: string,
 *     Content?: string,
 *     PublicSubject?: string,
 *     PublicContent?: string,
 *     IncidentId?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEngagementAsync(array{
 *     ContactId?: string,
 *     Sender?: string,
 *     Subject?: string,
 *     Content?: string,
 *     PublicSubject?: string,
 *     PublicContent?: string,
 *     IncidentId?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopEngagement(array $args = [])
 * @phpstan-method \Aws\Result stopEngagement(array{EngagementId?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEngagementAsync(array{EngagementId?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @phpstan-method \Aws\Result updateContact(array{
 *     ContactId?: string,
 *     DisplayName?: string,
 *     Plan?: array{Stages?: list<array>, RotationIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactAsync(array{
 *     ContactId?: string,
 *     DisplayName?: string,
 *     Plan?: array{Stages?: list<array>, RotationIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactChannel(array $args = [])
 * @phpstan-method \Aws\Result updateContactChannel(array{ContactChannelId?: string, Name?: string, DeliveryAddress?: array{SimpleAddress?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactChannelAsync(array{ContactChannelId?: string, Name?: string, DeliveryAddress?: array{SimpleAddress?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateRotation(array $args = [])
 * @phpstan-method \Aws\Result updateRotation(array{
 *     RotationId?: string,
 *     ContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRotationAsync(array{
 *     RotationId?: string,
 *     ContactIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     TimeZoneId?: string,
 *     Recurrence?: array{
 *         MonthlySettings?: list<array>,
 *         WeeklySettings?: list<array>,
 *         DailySettings?: list<array>,
 *         NumberOfOnCalls?: int,
 *         ShiftCoverages?: array<string, list<array>>,
 *         RecurrenceMultiplier?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class SSMContactsClient extends AwsClient {}
