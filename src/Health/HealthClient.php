<?php
namespace Aws\Health;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Health APIs and Notifications** service.
 * @method \Aws\Result describeAffectedAccountsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeAffectedAccountsForOrganization(array{eventArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAffectedAccountsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAffectedAccountsForOrganizationAsync(array{eventArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeAffectedEntities(array $args = [])
 * @phpstan-method \Aws\Result describeAffectedEntities(array{
 *     filter?: array{
 *         eventArns?: list<string>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         lastUpdatedTimes?: list<array>,
 *         tags?: list<array<string, string>>,
 *         statusCodes?: list<'IMPAIRED'|'PENDING'|'RESOLVED'|'UNIMPAIRED'|'UNKNOWN'>,
 *         ...,
 *     },
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAffectedEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAffectedEntitiesAsync(array{
 *     filter?: array{
 *         eventArns?: list<string>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         lastUpdatedTimes?: list<array>,
 *         tags?: list<array<string, string>>,
 *         statusCodes?: list<'IMPAIRED'|'PENDING'|'RESOLVED'|'UNIMPAIRED'|'UNKNOWN'>,
 *         ...,
 *     },
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAffectedEntitiesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeAffectedEntitiesForOrganization(array{
 *     organizationEntityFilters?: list<array{eventArn?: string, awsAccountId?: string, ...}>,
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     organizationEntityAccountFilters?: list<array{
 *         eventArn?: string,
 *         awsAccountId?: string,
 *         statusCodes?: list<'IMPAIRED'|'PENDING'|'RESOLVED'|'UNIMPAIRED'|'UNKNOWN'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAffectedEntitiesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAffectedEntitiesForOrganizationAsync(array{
 *     organizationEntityFilters?: list<array{eventArn?: string, awsAccountId?: string, ...}>,
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     organizationEntityAccountFilters?: list<array{
 *         eventArn?: string,
 *         awsAccountId?: string,
 *         statusCodes?: list<'IMPAIRED'|'PENDING'|'RESOLVED'|'UNIMPAIRED'|'UNKNOWN'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEntityAggregates(array $args = [])
 * @phpstan-method \Aws\Result describeEntityAggregates(array{eventArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityAggregatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityAggregatesAsync(array{eventArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeEntityAggregatesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeEntityAggregatesForOrganization(array{eventArns?: list<string>, awsAccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityAggregatesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityAggregatesForOrganizationAsync(array{eventArns?: list<string>, awsAccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeEventAggregates(array $args = [])
 * @phpstan-method \Aws\Result describeEventAggregates(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventArns?: list<string>,
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         availabilityZones?: list<string>,
 *         startTimes?: list<array>,
 *         endTimes?: list<array>,
 *         lastUpdatedTimes?: list<array>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         tags?: list<array<string, string>>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     aggregateField?: 'eventTypeCategory',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventAggregatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventAggregatesAsync(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventArns?: list<string>,
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         availabilityZones?: list<string>,
 *         startTimes?: list<array>,
 *         endTimes?: list<array>,
 *         lastUpdatedTimes?: list<array>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         tags?: list<array<string, string>>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     aggregateField?: 'eventTypeCategory',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEventDetails(array $args = [])
 * @phpstan-method \Aws\Result describeEventDetails(array{eventArns?: list<string>, locale?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventDetailsAsync(array{eventArns?: list<string>, locale?: string, ...} $args = [])
 * @method \Aws\Result describeEventDetailsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeEventDetailsForOrganization(array{
 *     organizationEventDetailFilters?: list<array{eventArn?: string, awsAccountId?: string, ...}>,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventDetailsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventDetailsForOrganizationAsync(array{
 *     organizationEventDetailFilters?: list<array{eventArn?: string, awsAccountId?: string, ...}>,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEventTypes(array $args = [])
 * @phpstan-method \Aws\Result describeEventTypes(array{
 *     filter?: array{
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventTypesAsync(array{
 *     filter?: array{
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     locale?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventArns?: list<string>,
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         availabilityZones?: list<string>,
 *         startTimes?: list<array>,
 *         endTimes?: list<array>,
 *         lastUpdatedTimes?: list<array>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         tags?: list<array<string, string>>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventArns?: list<string>,
 *         eventTypeCodes?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         availabilityZones?: list<string>,
 *         startTimes?: list<array>,
 *         endTimes?: list<array>,
 *         lastUpdatedTimes?: list<array>,
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         tags?: list<array<string, string>>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEventsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeEventsForOrganization(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventTypeCodes?: list<string>,
 *         awsAccountIds?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         startTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         endTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         lastUpdatedTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsForOrganizationAsync(array{
 *     filter?: array{
 *         actionabilities?: list<'ACTION_MAY_BE_REQUIRED'|'ACTION_REQUIRED'|'INFORMATIONAL'>,
 *         eventTypeCodes?: list<string>,
 *         awsAccountIds?: list<string>,
 *         services?: list<string>,
 *         regions?: list<string>,
 *         startTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         endTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         lastUpdatedTime?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         entityArns?: list<string>,
 *         entityValues?: list<string>,
 *         eventTypeCategories?: list<'accountNotification'|'investigation'|'issue'|'scheduledChange'>,
 *         eventStatusCodes?: list<'closed'|'open'|'upcoming'>,
 *         personas?: list<'BILLING'|'OPERATIONS'|'SECURITY'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeHealthServiceStatusForOrganization(array $args = [])
 * @phpstan-method \Aws\Result describeHealthServiceStatusForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHealthServiceStatusForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHealthServiceStatusForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result disableHealthServiceAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result disableHealthServiceAccessForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableHealthServiceAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableHealthServiceAccessForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result enableHealthServiceAccessForOrganization(array $args = [])
 * @phpstan-method \Aws\Result enableHealthServiceAccessForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableHealthServiceAccessForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableHealthServiceAccessForOrganizationAsync(array{...} $args = [])
 */
class HealthClient extends AwsClient {}
