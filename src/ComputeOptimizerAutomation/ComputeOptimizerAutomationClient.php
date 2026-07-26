<?php
namespace Aws\ComputeOptimizerAutomation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Compute Optimizer Automation** service.
 * @method \Aws\Result associateAccounts(array $args = [])
 * @phpstan-method \Aws\Result associateAccounts(array{accountIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAccountsAsync(array{accountIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createAutomationRule(array $args = [])
 * @phpstan-method \Aws\Result createAutomationRule(array{
 *     name?: string,
 *     description?: string,
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationConfiguration?: array{ruleApplyOrder?: 'AfterAccountRules'|'BeforeAccountRules', accountIds?: list<string>, ...},
 *     priority?: string,
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     schedule?: array{scheduleExpression?: string, scheduleExpressionTimezone?: string, executionWindowInMinutes?: int, ...},
 *     status?: 'Active'|'Inactive',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomationRuleAsync(array{
 *     name?: string,
 *     description?: string,
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationConfiguration?: array{ruleApplyOrder?: 'AfterAccountRules'|'BeforeAccountRules', accountIds?: list<string>, ...},
 *     priority?: string,
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     schedule?: array{scheduleExpression?: string, scheduleExpressionTimezone?: string, executionWindowInMinutes?: int, ...},
 *     status?: 'Active'|'Inactive',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutomationRule(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomationRule(array{ruleArn?: string, ruleRevision?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomationRuleAsync(array{ruleArn?: string, ruleRevision?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateAccounts(array $args = [])
 * @phpstan-method \Aws\Result disassociateAccounts(array{accountIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAccountsAsync(array{accountIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getAutomationEvent(array $args = [])
 * @phpstan-method \Aws\Result getAutomationEvent(array{eventId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomationEventAsync(array{eventId?: string, ...} $args = [])
 * @method \Aws\Result getAutomationRule(array $args = [])
 * @phpstan-method \Aws\Result getAutomationRule(array{ruleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomationRuleAsync(array{ruleArn?: string, ...} $args = [])
 * @method \Aws\Result getEnrollmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEnrollmentConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnrollmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnrollmentConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAutomationEventSteps(array $args = [])
 * @phpstan-method \Aws\Result listAutomationEventSteps(array{eventId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationEventStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationEventStepsAsync(array{eventId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAutomationEventSummaries(array $args = [])
 * @phpstan-method \Aws\Result listAutomationEventSummaries(array{
 *     filters?: list<array{name?: 'AccountId'|'EventStatus'|'EventType'|'ResourceType', values?: list<string>, ...}>,
 *     startDateInclusive?: string,
 *     endDateExclusive?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationEventSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationEventSummariesAsync(array{
 *     filters?: list<array{name?: 'AccountId'|'EventStatus'|'EventType'|'ResourceType', values?: list<string>, ...}>,
 *     startDateInclusive?: string,
 *     endDateExclusive?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomationEvents(array $args = [])
 * @phpstan-method \Aws\Result listAutomationEvents(array{
 *     filters?: list<array{name?: 'AccountId'|'EventStatus'|'EventType'|'ResourceType', values?: list<string>, ...}>,
 *     startTimeInclusive?: int|string|\DateTimeInterface,
 *     endTimeExclusive?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationEventsAsync(array{
 *     filters?: list<array{name?: 'AccountId'|'EventStatus'|'EventType'|'ResourceType', values?: list<string>, ...}>,
 *     startTimeInclusive?: int|string|\DateTimeInterface,
 *     endTimeExclusive?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomationRulePreview(array $args = [])
 * @phpstan-method \Aws\Result listAutomationRulePreview(array{
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationScope?: array{accountIds?: list<string>, ...},
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulePreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationRulePreviewAsync(array{
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationScope?: array{accountIds?: list<string>, ...},
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomationRulePreviewSummaries(array $args = [])
 * @phpstan-method \Aws\Result listAutomationRulePreviewSummaries(array{
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationScope?: array{accountIds?: list<string>, ...},
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulePreviewSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationRulePreviewSummariesAsync(array{
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationScope?: array{accountIds?: list<string>, ...},
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomationRules(array $args = [])
 * @phpstan-method \Aws\Result listAutomationRules(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'Name'|'OrganizationConfigurationRuleApplyOrder'|'RecommendedActionType'|'RuleType'|'Status',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationRulesAsync(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'Name'|'OrganizationConfigurationRuleApplyOrder'|'RecommendedActionType'|'RuleType'|'Status',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendedActionSummaries(array $args = [])
 * @phpstan-method \Aws\Result listRecommendedActionSummaries(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'CurrentResourceDetailsEbsVolumeType'|'LookBackPeriodInDays'|'RecommendedActionType'|'ResourceId'|'ResourceTagsKey'|'ResourceTagsValue'|'ResourceType'|'RestartNeeded',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendedActionSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendedActionSummariesAsync(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'CurrentResourceDetailsEbsVolumeType'|'LookBackPeriodInDays'|'RecommendedActionType'|'ResourceId'|'ResourceTagsKey'|'ResourceTagsValue'|'ResourceType'|'RestartNeeded',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendedActions(array $args = [])
 * @phpstan-method \Aws\Result listRecommendedActions(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'CurrentResourceDetailsEbsVolumeType'|'LookBackPeriodInDays'|'RecommendedActionType'|'ResourceId'|'ResourceTagsKey'|'ResourceTagsValue'|'ResourceType'|'RestartNeeded',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array{
 *     filters?: list<array{
 *         name?: 'AccountId'|'CurrentResourceDetailsEbsVolumeType'|'LookBackPeriodInDays'|'RecommendedActionType'|'ResourceId'|'ResourceTagsKey'|'ResourceTagsValue'|'ResourceType'|'RestartNeeded',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result rollbackAutomationEvent(array $args = [])
 * @phpstan-method \Aws\Result rollbackAutomationEvent(array{eventId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackAutomationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackAutomationEventAsync(array{eventId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result startAutomationEvent(array $args = [])
 * @phpstan-method \Aws\Result startAutomationEvent(array{recommendedActionId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutomationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutomationEventAsync(array{recommendedActionId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{
 *     resourceArn?: string,
 *     ruleRevision?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{
 *     resourceArn?: string,
 *     ruleRevision?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, ruleRevision?: int, tagKeys?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, ruleRevision?: int, tagKeys?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateAutomationRule(array $args = [])
 * @phpstan-method \Aws\Result updateAutomationRule(array{
 *     ruleArn?: string,
 *     ruleRevision?: int,
 *     name?: string,
 *     description?: string,
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationConfiguration?: array{ruleApplyOrder?: 'AfterAccountRules'|'BeforeAccountRules', accountIds?: list<string>, ...},
 *     priority?: string,
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     schedule?: array{scheduleExpression?: string, scheduleExpressionTimezone?: string, executionWindowInMinutes?: int, ...},
 *     status?: 'Active'|'Inactive',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomationRuleAsync(array{
 *     ruleArn?: string,
 *     ruleRevision?: int,
 *     name?: string,
 *     description?: string,
 *     ruleType?: 'AccountRule'|'OrganizationRule',
 *     organizationConfiguration?: array{ruleApplyOrder?: 'AfterAccountRules'|'BeforeAccountRules', accountIds?: list<string>, ...},
 *     priority?: string,
 *     recommendedActionTypes?: list<'SnapshotAndDeleteUnattachedEbsVolume'|'UpgradeEbsVolumeType'>,
 *     criteria?: array{
 *         region?: list<array>,
 *         resourceArn?: list<array>,
 *         ebsVolumeType?: list<array>,
 *         ebsVolumeSizeInGib?: list<array>,
 *         estimatedMonthlySavings?: list<array>,
 *         resourceTag?: list<array>,
 *         lookBackPeriodInDays?: list<array>,
 *         restartNeeded?: list<array>,
 *         ...,
 *     },
 *     schedule?: array{scheduleExpression?: string, scheduleExpressionTimezone?: string, executionWindowInMinutes?: int, ...},
 *     status?: 'Active'|'Inactive',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnrollmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateEnrollmentConfiguration(array{status?: 'Active'|'Failed'|'Inactive'|'Pending', clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnrollmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnrollmentConfigurationAsync(array{status?: 'Active'|'Failed'|'Inactive'|'Pending', clientToken?: string, ...} $args = [])
 */
class ComputeOptimizerAutomationClient extends AwsClient {}
