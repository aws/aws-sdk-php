<?php
namespace Aws\SSMIncidents;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager Incident Manager** service.
 * @method \Aws\Result batchGetIncidentFindings(array $args = [])
 * @phpstan-method \Aws\Result batchGetIncidentFindings(array{findingIds?: list<string>, incidentRecordArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetIncidentFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetIncidentFindingsAsync(array{findingIds?: list<string>, incidentRecordArn?: string, ...} $args = [])
 * @method \Aws\Result createReplicationSet(array $args = [])
 * @phpstan-method \Aws\Result createReplicationSet(array{
 *     clientToken?: string,
 *     regions?: array<string, array{sseKmsKeyId?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationSetAsync(array{
 *     clientToken?: string,
 *     regions?: array<string, array{sseKmsKeyId?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResponsePlan(array $args = [])
 * @phpstan-method \Aws\Result createResponsePlan(array{
 *     actions?: list<array{ssmAutomation?: array, ...}>,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     displayName?: string,
 *     engagements?: list<string>,
 *     incidentTemplate?: array{
 *         dedupeString?: string,
 *         impact?: int,
 *         incidentTags?: array<string, string>,
 *         notificationTargets?: list<array>,
 *         summary?: string,
 *         title?: string,
 *         ...,
 *     },
 *     integrations?: list<array{pagerDutyConfiguration?: array, ...}>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResponsePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResponsePlanAsync(array{
 *     actions?: list<array{ssmAutomation?: array, ...}>,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     displayName?: string,
 *     engagements?: list<string>,
 *     incidentTemplate?: array{
 *         dedupeString?: string,
 *         impact?: int,
 *         incidentTags?: array<string, string>,
 *         notificationTargets?: list<array>,
 *         summary?: string,
 *         title?: string,
 *         ...,
 *     },
 *     integrations?: list<array{pagerDutyConfiguration?: array, ...}>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTimelineEvent(array $args = [])
 * @phpstan-method \Aws\Result createTimelineEvent(array{
 *     clientToken?: string,
 *     eventData?: string,
 *     eventReferences?: list<array{relatedItemId?: string, resource?: string, ...}>,
 *     eventTime?: int|string|\DateTimeInterface,
 *     eventType?: string,
 *     incidentRecordArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTimelineEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTimelineEventAsync(array{
 *     clientToken?: string,
 *     eventData?: string,
 *     eventReferences?: list<array{relatedItemId?: string, resource?: string, ...}>,
 *     eventTime?: int|string|\DateTimeInterface,
 *     eventType?: string,
 *     incidentRecordArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIncidentRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteIncidentRecord(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIncidentRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIncidentRecordAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationSet(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationSetAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{policyId?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{policyId?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResponsePlan(array $args = [])
 * @phpstan-method \Aws\Result deleteResponsePlan(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResponsePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResponsePlanAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteTimelineEvent(array $args = [])
 * @phpstan-method \Aws\Result deleteTimelineEvent(array{eventId?: string, incidentRecordArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTimelineEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTimelineEventAsync(array{eventId?: string, incidentRecordArn?: string, ...} $args = [])
 * @method \Aws\Result getIncidentRecord(array $args = [])
 * @phpstan-method \Aws\Result getIncidentRecord(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIncidentRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIncidentRecordAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getReplicationSet(array $args = [])
 * @phpstan-method \Aws\Result getReplicationSet(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReplicationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReplicationSetAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicies(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getResponsePlan(array $args = [])
 * @phpstan-method \Aws\Result getResponsePlan(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResponsePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResponsePlanAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getTimelineEvent(array $args = [])
 * @phpstan-method \Aws\Result getTimelineEvent(array{eventId?: string, incidentRecordArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTimelineEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTimelineEventAsync(array{eventId?: string, incidentRecordArn?: string, ...} $args = [])
 * @method \Aws\Result listIncidentFindings(array $args = [])
 * @phpstan-method \Aws\Result listIncidentFindings(array{incidentRecordArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIncidentFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIncidentFindingsAsync(array{incidentRecordArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIncidentRecords(array $args = [])
 * @phpstan-method \Aws\Result listIncidentRecords(array{filters?: list<array{condition?: array, key?: string, ...}>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIncidentRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIncidentRecordsAsync(array{filters?: list<array{condition?: array, key?: string, ...}>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRelatedItems(array $args = [])
 * @phpstan-method \Aws\Result listRelatedItems(array{incidentRecordArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRelatedItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRelatedItemsAsync(array{incidentRecordArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReplicationSets(array $args = [])
 * @phpstan-method \Aws\Result listReplicationSets(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReplicationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReplicationSetsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResponsePlans(array $args = [])
 * @phpstan-method \Aws\Result listResponsePlans(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResponsePlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResponsePlansAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTimelineEvents(array $args = [])
 * @phpstan-method \Aws\Result listTimelineEvents(array{
 *     filters?: list<array{condition?: array, key?: string, ...}>,
 *     incidentRecordArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'EVENT_TIME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTimelineEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTimelineEventsAsync(array{
 *     filters?: list<array{condition?: array, key?: string, ...}>,
 *     incidentRecordArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'EVENT_TIME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startIncident(array $args = [])
 * @phpstan-method \Aws\Result startIncident(array{
 *     clientToken?: string,
 *     impact?: int,
 *     relatedItems?: list<array{generatedId?: string, identifier?: array, title?: string, ...}>,
 *     responsePlanArn?: string,
 *     title?: string,
 *     triggerDetails?: array{rawData?: string, source?: string, timestamp?: int|string|\DateTimeInterface, triggerArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startIncidentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startIncidentAsync(array{
 *     clientToken?: string,
 *     impact?: int,
 *     relatedItems?: list<array{generatedId?: string, identifier?: array, title?: string, ...}>,
 *     responsePlanArn?: string,
 *     title?: string,
 *     triggerDetails?: array{rawData?: string, source?: string, timestamp?: int|string|\DateTimeInterface, triggerArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDeletionProtection(array $args = [])
 * @phpstan-method \Aws\Result updateDeletionProtection(array{arn?: string, clientToken?: string, deletionProtected?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeletionProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeletionProtectionAsync(array{arn?: string, clientToken?: string, deletionProtected?: bool, ...} $args = [])
 * @method \Aws\Result updateIncidentRecord(array $args = [])
 * @phpstan-method \Aws\Result updateIncidentRecord(array{
 *     arn?: string,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     impact?: int,
 *     notificationTargets?: list<array{snsTopicArn?: string, ...}>,
 *     status?: 'OPEN'|'RESOLVED',
 *     summary?: string,
 *     title?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIncidentRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIncidentRecordAsync(array{
 *     arn?: string,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     impact?: int,
 *     notificationTargets?: list<array{snsTopicArn?: string, ...}>,
 *     status?: 'OPEN'|'RESOLVED',
 *     summary?: string,
 *     title?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRelatedItems(array $args = [])
 * @phpstan-method \Aws\Result updateRelatedItems(array{
 *     clientToken?: string,
 *     incidentRecordArn?: string,
 *     relatedItemsUpdate?: array{
 *         itemToAdd?: array{generatedId?: string, identifier?: array, title?: string, ...},
 *         itemToRemove?: array{
 *             type?: 'ANALYSIS'|'ATTACHMENT'|'AUTOMATION'|'INCIDENT'|'INVOLVED_RESOURCE'|'METRIC'|'OTHER'|'PARENT'|'TASK',
 *             value?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRelatedItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelatedItemsAsync(array{
 *     clientToken?: string,
 *     incidentRecordArn?: string,
 *     relatedItemsUpdate?: array{
 *         itemToAdd?: array{generatedId?: string, identifier?: array, title?: string, ...},
 *         itemToRemove?: array{
 *             type?: 'ANALYSIS'|'ATTACHMENT'|'AUTOMATION'|'INCIDENT'|'INVOLVED_RESOURCE'|'METRIC'|'OTHER'|'PARENT'|'TASK',
 *             value?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReplicationSet(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationSet(array{
 *     actions?: list<array{addRegionAction?: array, deleteRegionAction?: array, ...}>,
 *     arn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationSetAsync(array{
 *     actions?: list<array{addRegionAction?: array, deleteRegionAction?: array, ...}>,
 *     arn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResponsePlan(array $args = [])
 * @phpstan-method \Aws\Result updateResponsePlan(array{
 *     actions?: list<array{ssmAutomation?: array, ...}>,
 *     arn?: string,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     displayName?: string,
 *     engagements?: list<string>,
 *     incidentTemplateDedupeString?: string,
 *     incidentTemplateImpact?: int,
 *     incidentTemplateNotificationTargets?: list<array{snsTopicArn?: string, ...}>,
 *     incidentTemplateSummary?: string,
 *     incidentTemplateTags?: array<string, string>,
 *     incidentTemplateTitle?: string,
 *     integrations?: list<array{pagerDutyConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResponsePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResponsePlanAsync(array{
 *     actions?: list<array{ssmAutomation?: array, ...}>,
 *     arn?: string,
 *     chatChannel?: array{chatbotSns?: list<string>, empty?: array, ...},
 *     clientToken?: string,
 *     displayName?: string,
 *     engagements?: list<string>,
 *     incidentTemplateDedupeString?: string,
 *     incidentTemplateImpact?: int,
 *     incidentTemplateNotificationTargets?: list<array{snsTopicArn?: string, ...}>,
 *     incidentTemplateSummary?: string,
 *     incidentTemplateTags?: array<string, string>,
 *     incidentTemplateTitle?: string,
 *     integrations?: list<array{pagerDutyConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTimelineEvent(array $args = [])
 * @phpstan-method \Aws\Result updateTimelineEvent(array{
 *     clientToken?: string,
 *     eventData?: string,
 *     eventId?: string,
 *     eventReferences?: list<array{relatedItemId?: string, resource?: string, ...}>,
 *     eventTime?: int|string|\DateTimeInterface,
 *     eventType?: string,
 *     incidentRecordArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTimelineEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTimelineEventAsync(array{
 *     clientToken?: string,
 *     eventData?: string,
 *     eventId?: string,
 *     eventReferences?: list<array{relatedItemId?: string, resource?: string, ...}>,
 *     eventTime?: int|string|\DateTimeInterface,
 *     eventType?: string,
 *     incidentRecordArn?: string,
 *     ...,
 * } $args = [])
 */
class SSMIncidentsClient extends AwsClient {}
