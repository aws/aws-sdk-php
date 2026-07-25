<?php
namespace Aws\Inspector;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Inspector** service.
 *
 * @method \Aws\Result addAttributesToFindings(array $args = [])
 * @phpstan-method \Aws\Result addAttributesToFindings(array{findingArns?: list<string>, attributes?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addAttributesToFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addAttributesToFindingsAsync(array{findingArns?: list<string>, attributes?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createAssessmentTarget(array $args = [])
 * @phpstan-method \Aws\Result createAssessmentTarget(array{assessmentTargetName?: string, resourceGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssessmentTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssessmentTargetAsync(array{assessmentTargetName?: string, resourceGroupArn?: string, ...} $args = [])
 * @method \Aws\Result createAssessmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result createAssessmentTemplate(array{
 *     assessmentTargetArn?: string,
 *     assessmentTemplateName?: string,
 *     durationInSeconds?: int,
 *     rulesPackageArns?: list<string>,
 *     userAttributesForFindings?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssessmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssessmentTemplateAsync(array{
 *     assessmentTargetArn?: string,
 *     assessmentTemplateName?: string,
 *     durationInSeconds?: int,
 *     rulesPackageArns?: list<string>,
 *     userAttributesForFindings?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExclusionsPreview(array $args = [])
 * @phpstan-method \Aws\Result createExclusionsPreview(array{assessmentTemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createExclusionsPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExclusionsPreviewAsync(array{assessmentTemplateArn?: string, ...} $args = [])
 * @method \Aws\Result createResourceGroup(array $args = [])
 * @phpstan-method \Aws\Result createResourceGroup(array{resourceGroupTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceGroupAsync(array{resourceGroupTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentRun(array{assessmentRunArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentRunAsync(array{assessmentRunArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAssessmentTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentTarget(array{assessmentTargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentTargetAsync(array{assessmentTargetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAssessmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentTemplate(array{assessmentTemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentTemplateAsync(array{assessmentTemplateArn?: string, ...} $args = [])
 * @method \Aws\Result describeAssessmentRuns(array $args = [])
 * @phpstan-method \Aws\Result describeAssessmentRuns(array{assessmentRunArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssessmentRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssessmentRunsAsync(array{assessmentRunArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeAssessmentTargets(array $args = [])
 * @phpstan-method \Aws\Result describeAssessmentTargets(array{assessmentTargetArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssessmentTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssessmentTargetsAsync(array{assessmentTargetArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeAssessmentTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeAssessmentTemplates(array{assessmentTemplateArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssessmentTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssessmentTemplatesAsync(array{assessmentTemplateArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeCrossAccountAccessRole(array $args = [])
 * @phpstan-method \Aws\Result describeCrossAccountAccessRole(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCrossAccountAccessRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCrossAccountAccessRoleAsync(array{...} $args = [])
 * @method \Aws\Result describeExclusions(array $args = [])
 * @phpstan-method \Aws\Result describeExclusions(array{exclusionArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExclusionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExclusionsAsync(array{exclusionArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \Aws\Result describeFindings(array $args = [])
 * @phpstan-method \Aws\Result describeFindings(array{findingArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFindingsAsync(array{findingArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \Aws\Result describeResourceGroups(array $args = [])
 * @phpstan-method \Aws\Result describeResourceGroups(array{resourceGroupArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceGroupsAsync(array{resourceGroupArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeRulesPackages(array $args = [])
 * @phpstan-method \Aws\Result describeRulesPackages(array{rulesPackageArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRulesPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRulesPackagesAsync(array{rulesPackageArns?: list<string>, locale?: 'EN_US', ...} $args = [])
 * @method \Aws\Result getAssessmentReport(array $args = [])
 * @phpstan-method \Aws\Result getAssessmentReport(array{assessmentRunArn?: string, reportFileFormat?: 'HTML'|'PDF', reportType?: 'FINDING'|'FULL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssessmentReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssessmentReportAsync(array{assessmentRunArn?: string, reportFileFormat?: 'HTML'|'PDF', reportType?: 'FINDING'|'FULL', ...} $args = [])
 * @method \Aws\Result getExclusionsPreview(array $args = [])
 * @phpstan-method \Aws\Result getExclusionsPreview(array{
 *     assessmentTemplateArn?: string,
 *     previewToken?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: 'EN_US',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getExclusionsPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExclusionsPreviewAsync(array{
 *     assessmentTemplateArn?: string,
 *     previewToken?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     locale?: 'EN_US',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTelemetryMetadata(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryMetadata(array{assessmentRunArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryMetadataAsync(array{assessmentRunArn?: string, ...} $args = [])
 * @method \Aws\Result listAssessmentRunAgents(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentRunAgents(array{
 *     assessmentRunArn?: string,
 *     filter?: array{
 *         agentHealths?: list<'HEALTHY'|'UNHEALTHY'|'UNKNOWN'>,
 *         agentHealthCodes?: list<'IDLE'|'RUNNING'|'SHUTDOWN'|'THROTTLED'|'UNHEALTHY'|'UNKNOWN'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentRunAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentRunAgentsAsync(array{
 *     assessmentRunArn?: string,
 *     filter?: array{
 *         agentHealths?: list<'HEALTHY'|'UNHEALTHY'|'UNKNOWN'>,
 *         agentHealthCodes?: list<'IDLE'|'RUNNING'|'SHUTDOWN'|'THROTTLED'|'UNHEALTHY'|'UNKNOWN'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssessmentRuns(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentRuns(array{
 *     assessmentTemplateArns?: list<string>,
 *     filter?: array{
 *         namePattern?: string,
 *         states?: list<'CANCELED'|'COLLECTING_DATA'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'CREATED'|'DATA_COLLECTED'|'ERROR'|'EVALUATING_RULES'|'FAILED'|'START_DATA_COLLECTION_IN_PROGRESS'|'START_DATA_COLLECTION_PENDING'|'START_EVALUATING_RULES_PENDING'|'STOP_DATA_COLLECTION_PENDING'>,
 *         durationRange?: array{minSeconds?: int, maxSeconds?: int, ...},
 *         rulesPackageArns?: list<string>,
 *         startTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         completionTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         stateChangeTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentRunsAsync(array{
 *     assessmentTemplateArns?: list<string>,
 *     filter?: array{
 *         namePattern?: string,
 *         states?: list<'CANCELED'|'COLLECTING_DATA'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'CREATED'|'DATA_COLLECTED'|'ERROR'|'EVALUATING_RULES'|'FAILED'|'START_DATA_COLLECTION_IN_PROGRESS'|'START_DATA_COLLECTION_PENDING'|'START_EVALUATING_RULES_PENDING'|'STOP_DATA_COLLECTION_PENDING'>,
 *         durationRange?: array{minSeconds?: int, maxSeconds?: int, ...},
 *         rulesPackageArns?: list<string>,
 *         startTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         completionTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         stateChangeTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssessmentTargets(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentTargets(array{filter?: array{assessmentTargetNamePattern?: string, ...}, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentTargetsAsync(array{filter?: array{assessmentTargetNamePattern?: string, ...}, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssessmentTemplates(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentTemplates(array{
 *     assessmentTargetArns?: list<string>,
 *     filter?: array{
 *         namePattern?: string,
 *         durationRange?: array{minSeconds?: int, maxSeconds?: int, ...},
 *         rulesPackageArns?: list<string>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentTemplatesAsync(array{
 *     assessmentTargetArns?: list<string>,
 *     filter?: array{
 *         namePattern?: string,
 *         durationRange?: array{minSeconds?: int, maxSeconds?: int, ...},
 *         rulesPackageArns?: list<string>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listEventSubscriptions(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventSubscriptionsAsync(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listExclusions(array $args = [])
 * @phpstan-method \Aws\Result listExclusions(array{assessmentRunArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExclusionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExclusionsAsync(array{assessmentRunArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     assessmentRunArns?: list<string>,
 *     filter?: array{
 *         agentIds?: list<string>,
 *         autoScalingGroups?: list<string>,
 *         ruleNames?: list<string>,
 *         severities?: list<'High'|'Informational'|'Low'|'Medium'|'Undefined'>,
 *         rulesPackageArns?: list<string>,
 *         attributes?: list<array>,
 *         userAttributes?: list<array>,
 *         creationTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     assessmentRunArns?: list<string>,
 *     filter?: array{
 *         agentIds?: list<string>,
 *         autoScalingGroups?: list<string>,
 *         ruleNames?: list<string>,
 *         severities?: list<'High'|'Informational'|'Low'|'Medium'|'Undefined'>,
 *         rulesPackageArns?: list<string>,
 *         attributes?: list<array>,
 *         userAttributes?: list<array>,
 *         creationTimeRange?: array{beginDate?: int|string|\DateTimeInterface, endDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRulesPackages(array $args = [])
 * @phpstan-method \Aws\Result listRulesPackages(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesPackagesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result previewAgents(array $args = [])
 * @phpstan-method \Aws\Result previewAgents(array{previewAgentsArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise previewAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise previewAgentsAsync(array{previewAgentsArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result registerCrossAccountAccessRole(array $args = [])
 * @phpstan-method \Aws\Result registerCrossAccountAccessRole(array{roleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCrossAccountAccessRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCrossAccountAccessRoleAsync(array{roleArn?: string, ...} $args = [])
 * @method \Aws\Result removeAttributesFromFindings(array $args = [])
 * @phpstan-method \Aws\Result removeAttributesFromFindings(array{findingArns?: list<string>, attributeKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAttributesFromFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAttributesFromFindingsAsync(array{findingArns?: list<string>, attributeKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result setTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result setTagsForResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTagsForResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result startAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result startAssessmentRun(array{assessmentTemplateArn?: string, assessmentRunName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssessmentRunAsync(array{assessmentTemplateArn?: string, assessmentRunName?: string, ...} $args = [])
 * @method \Aws\Result stopAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result stopAssessmentRun(array{assessmentRunArn?: string, stopAction?: 'SKIP_EVALUATION'|'START_EVALUATION', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAssessmentRunAsync(array{assessmentRunArn?: string, stopAction?: 'SKIP_EVALUATION'|'START_EVALUATION', ...} $args = [])
 * @method \Aws\Result subscribeToEvent(array $args = [])
 * @phpstan-method \Aws\Result subscribeToEvent(array{
 *     resourceArn?: string,
 *     event?: 'ASSESSMENT_RUN_COMPLETED'|'ASSESSMENT_RUN_STARTED'|'ASSESSMENT_RUN_STATE_CHANGED'|'FINDING_REPORTED'|'OTHER',
 *     topicArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise subscribeToEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise subscribeToEventAsync(array{
 *     resourceArn?: string,
 *     event?: 'ASSESSMENT_RUN_COMPLETED'|'ASSESSMENT_RUN_STARTED'|'ASSESSMENT_RUN_STATE_CHANGED'|'FINDING_REPORTED'|'OTHER',
 *     topicArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result unsubscribeFromEvent(array $args = [])
 * @phpstan-method \Aws\Result unsubscribeFromEvent(array{
 *     resourceArn?: string,
 *     event?: 'ASSESSMENT_RUN_COMPLETED'|'ASSESSMENT_RUN_STARTED'|'ASSESSMENT_RUN_STATE_CHANGED'|'FINDING_REPORTED'|'OTHER',
 *     topicArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise unsubscribeFromEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unsubscribeFromEventAsync(array{
 *     resourceArn?: string,
 *     event?: 'ASSESSMENT_RUN_COMPLETED'|'ASSESSMENT_RUN_STARTED'|'ASSESSMENT_RUN_STATE_CHANGED'|'FINDING_REPORTED'|'OTHER',
 *     topicArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssessmentTarget(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentTarget(array{assessmentTargetArn?: string, assessmentTargetName?: string, resourceGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentTargetAsync(array{assessmentTargetArn?: string, assessmentTargetName?: string, resourceGroupArn?: string, ...} $args = [])
 */
class InspectorClient extends AwsClient {}
