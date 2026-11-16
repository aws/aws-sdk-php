<?php
namespace Aws\WellArchitected;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Well-Architected Tool** service.
 * @method \Aws\Result associateLenses(array $args = [])
 * @phpstan-method \Aws\Result associateLenses(array{WorkloadId?: string, LensAliases?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLensesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLensesAsync(array{WorkloadId?: string, LensAliases?: list<string>, ...} $args = [])
 * @method \Aws\Result associateProfiles(array $args = [])
 * @phpstan-method \Aws\Result associateProfiles(array{WorkloadId?: string, ProfileArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateProfilesAsync(array{WorkloadId?: string, ProfileArns?: list<string>, ...} $args = [])
 * @method \Aws\Result createAgentBasicProfile(array $args = [])
 * @phpstan-method \Aws\Result createAgentBasicProfile(array{tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentBasicProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentBasicProfileAsync(array{tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createAgentContext(array $args = [])
 * @phpstan-method \Aws\Result createAgentContext(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     title?: string,
 *     contextType?: 'APPLICATION',
 *     content?: array{
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         awsServices?: list<string>,
 *         resourceTypes?: list<string>,
 *         resourceTags?: list<array>,
 *         organizationalUnitIds?: list<string>,
 *         applicationOverview?: string,
 *         industry?: string,
 *         applicationType?: 'DESKTOP_APPLICATION'|'OTHER'|'SAS',
 *         criticality?: 'BUSINESS_CRITICAL'|'MISSION_CRITICAL'|'NON_CRITICAL'|'TEST_DEVELOPMENT',
 *         architectureOverview?: string,
 *         additionalContext?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentContextAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     title?: string,
 *     contextType?: 'APPLICATION',
 *     content?: array{
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         awsServices?: list<string>,
 *         resourceTypes?: list<string>,
 *         resourceTags?: list<array>,
 *         organizationalUnitIds?: list<string>,
 *         applicationOverview?: string,
 *         industry?: string,
 *         applicationType?: 'DESKTOP_APPLICATION'|'OTHER'|'SAS',
 *         criticality?: 'BUSINESS_CRITICAL'|'MISSION_CRITICAL'|'NON_CRITICAL'|'TEST_DEVELOPMENT',
 *         architectureOverview?: string,
 *         additionalContext?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentGoal(array $args = [])
 * @phpstan-method \Aws\Result createAgentGoal(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     title?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentGoalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentGoalAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     title?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentOrganizationalProfile(array $args = [])
 * @phpstan-method \Aws\Result createAgentOrganizationalProfile(array{
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     clientToken?: string,
 *     organizationalAggregationConfiguration?: array{organizationalUnits?: list<array>, accounts?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentOrganizationalProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentOrganizationalProfileAsync(array{
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     clientToken?: string,
 *     organizationalAggregationConfiguration?: array{organizationalUnits?: list<array>, accounts?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentOrganizationalReport(array $args = [])
 * @phpstan-method \Aws\Result createAgentOrganizationalReport(array{
 *     clientToken?: string,
 *     label?: string,
 *     filters?: array{
 *         accountIds?: list<string>,
 *         organizationalUnitIds?: list<string>,
 *         pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *         recommendationTypes?: list<'APPLICATION'|'ARCHITECTURE'|'RESOURCE'>,
 *         statuses?: list<'ACTIVE'|'COMPLETED'|'SUPPRESSED'>,
 *         priorities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         createdAtRange?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         updatedAtRange?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentOrganizationalReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentOrganizationalReportAsync(array{
 *     clientToken?: string,
 *     label?: string,
 *     filters?: array{
 *         accountIds?: list<string>,
 *         organizationalUnitIds?: list<string>,
 *         pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *         recommendationTypes?: list<'APPLICATION'|'ARCHITECTURE'|'RESOURCE'>,
 *         statuses?: list<'ACTIVE'|'COMPLETED'|'SUPPRESSED'>,
 *         priorities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         createdAtRange?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         updatedAtRange?: array{from?: int|string|\DateTimeInterface, to?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentProfile(array $args = [])
 * @phpstan-method \Aws\Result createAgentProfile(array{
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     executionRoleArn?: string,
 *     aggregationConfiguration?: list<array{accountId?: string, regions?: list<string>, accessRoleArn?: string, ...}>,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentProfileAsync(array{
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     executionRoleArn?: string,
 *     aggregationConfiguration?: list<array{accountId?: string, regions?: list<string>, accessRoleArn?: string, ...}>,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLensShare(array $args = [])
 * @phpstan-method \Aws\Result createLensShare(array{LensAlias?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLensShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLensShareAsync(array{LensAlias?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createLensVersion(array $args = [])
 * @phpstan-method \Aws\Result createLensVersion(array{LensAlias?: string, LensVersion?: string, IsMajorVersion?: bool, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLensVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLensVersionAsync(array{LensAlias?: string, LensVersion?: string, IsMajorVersion?: bool, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createMilestone(array $args = [])
 * @phpstan-method \Aws\Result createMilestone(array{WorkloadId?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMilestoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMilestoneAsync(array{WorkloadId?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createProfile(array $args = [])
 * @phpstan-method \Aws\Result createProfile(array{
 *     ProfileName?: string,
 *     ProfileDescription?: string,
 *     ProfileQuestions?: list<array{QuestionId?: string, SelectedChoiceIds?: list<string>, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileAsync(array{
 *     ProfileName?: string,
 *     ProfileDescription?: string,
 *     ProfileQuestions?: list<array{QuestionId?: string, SelectedChoiceIds?: list<string>, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProfileShare(array $args = [])
 * @phpstan-method \Aws\Result createProfileShare(array{ProfileArn?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileShareAsync(array{ProfileArn?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createReviewTemplate(array $args = [])
 * @phpstan-method \Aws\Result createReviewTemplate(array{
 *     TemplateName?: string,
 *     Description?: string,
 *     Lenses?: list<string>,
 *     Notes?: string,
 *     Tags?: array<string, string>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReviewTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReviewTemplateAsync(array{
 *     TemplateName?: string,
 *     Description?: string,
 *     Lenses?: list<string>,
 *     Notes?: string,
 *     Tags?: array<string, string>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplateShare(array $args = [])
 * @phpstan-method \Aws\Result createTemplateShare(array{TemplateArn?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateShareAsync(array{TemplateArn?: string, SharedWith?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createWorkload(array $args = [])
 * @phpstan-method \Aws\Result createWorkload(array{
 *     WorkloadName?: string,
 *     Description?: string,
 *     Environment?: 'PREPRODUCTION'|'PRODUCTION',
 *     AccountIds?: list<string>,
 *     AwsRegions?: list<string>,
 *     NonAwsRegions?: list<string>,
 *     PillarPriorities?: list<string>,
 *     ArchitecturalDesign?: string,
 *     ReviewOwner?: string,
 *     IndustryType?: string,
 *     Industry?: string,
 *     Lenses?: list<string>,
 *     Notes?: string,
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     DiscoveryConfig?: array{
 *         TrustedAdvisorIntegrationStatus?: 'DISABLED'|'ENABLED',
 *         WorkloadResourceDefinition?: list<'APP_REGISTRY'|'WORKLOAD_METADATA'>,
 *         ...,
 *     },
 *     Applications?: list<string>,
 *     ProfileArns?: list<string>,
 *     ReviewTemplateArns?: list<string>,
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED'|'INHERIT',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkloadAsync(array{
 *     WorkloadName?: string,
 *     Description?: string,
 *     Environment?: 'PREPRODUCTION'|'PRODUCTION',
 *     AccountIds?: list<string>,
 *     AwsRegions?: list<string>,
 *     NonAwsRegions?: list<string>,
 *     PillarPriorities?: list<string>,
 *     ArchitecturalDesign?: string,
 *     ReviewOwner?: string,
 *     IndustryType?: string,
 *     Industry?: string,
 *     Lenses?: list<string>,
 *     Notes?: string,
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     DiscoveryConfig?: array{
 *         TrustedAdvisorIntegrationStatus?: 'DISABLED'|'ENABLED',
 *         WorkloadResourceDefinition?: list<'APP_REGISTRY'|'WORKLOAD_METADATA'>,
 *         ...,
 *     },
 *     Applications?: list<string>,
 *     ProfileArns?: list<string>,
 *     ReviewTemplateArns?: list<string>,
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED'|'INHERIT',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkloadShare(array $args = [])
 * @phpstan-method \Aws\Result createWorkloadShare(array{
 *     WorkloadId?: string,
 *     SharedWith?: string,
 *     PermissionType?: 'CONTRIBUTOR'|'READONLY',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkloadShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkloadShareAsync(array{
 *     WorkloadId?: string,
 *     SharedWith?: string,
 *     PermissionType?: 'CONTRIBUTOR'|'READONLY',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAgentContext(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentContext(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentContextAsync(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentGoal(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentGoal(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentGoalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentGoalAsync(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentOrganizationalReport(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentOrganizationalReport(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentOrganizationalReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentOrganizationalReportAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentProfile(array{profileArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentProfileAsync(array{profileArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentProfilePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentProfilePolicy(array{profileArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentProfilePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentProfilePolicyAsync(array{profileArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentRecommendationPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentRecommendationPolicy(array{recommendationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentRecommendationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentRecommendationPolicyAsync(array{recommendationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLens(array $args = [])
 * @phpstan-method \Aws\Result deleteLens(array{LensAlias?: string, ClientRequestToken?: string, LensStatus?: 'ALL'|'DRAFT'|'PUBLISHED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLensAsync(array{LensAlias?: string, ClientRequestToken?: string, LensStatus?: 'ALL'|'DRAFT'|'PUBLISHED', ...} $args = [])
 * @method \Aws\Result deleteLensShare(array $args = [])
 * @phpstan-method \Aws\Result deleteLensShare(array{ShareId?: string, LensAlias?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLensShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLensShareAsync(array{ShareId?: string, LensAlias?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProfile(array{ProfileArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileAsync(array{ProfileArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteProfileShare(array $args = [])
 * @phpstan-method \Aws\Result deleteProfileShare(array{ShareId?: string, ProfileArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileShareAsync(array{ShareId?: string, ProfileArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteReviewTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteReviewTemplate(array{TemplateArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReviewTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReviewTemplateAsync(array{TemplateArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplateShare(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplateShare(array{ShareId?: string, TemplateArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateShareAsync(array{ShareId?: string, TemplateArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkload(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkload(array{WorkloadId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkloadAsync(array{WorkloadId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkloadShare(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkloadShare(array{ShareId?: string, WorkloadId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkloadShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkloadShareAsync(array{ShareId?: string, WorkloadId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateLenses(array $args = [])
 * @phpstan-method \Aws\Result disassociateLenses(array{WorkloadId?: string, LensAliases?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLensesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLensesAsync(array{WorkloadId?: string, LensAliases?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateProfiles(array $args = [])
 * @phpstan-method \Aws\Result disassociateProfiles(array{WorkloadId?: string, ProfileArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateProfilesAsync(array{WorkloadId?: string, ProfileArns?: list<string>, ...} $args = [])
 * @method \Aws\Result exportLens(array $args = [])
 * @phpstan-method \Aws\Result exportLens(array{LensAlias?: string, LensVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportLensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportLensAsync(array{LensAlias?: string, LensVersion?: string, ...} $args = [])
 * @method \Aws\Result getAgentContext(array $args = [])
 * @phpstan-method \Aws\Result getAgentContext(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentContextAsync(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getAgentGoal(array $args = [])
 * @phpstan-method \Aws\Result getAgentGoal(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentGoalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentGoalAsync(array{profileArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getAgentOrganizationalReport(array $args = [])
 * @phpstan-method \Aws\Result getAgentOrganizationalReport(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentOrganizationalReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentOrganizationalReportAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result getAgentOrganizationalReportData(array $args = [])
 * @phpstan-method \Aws\Result getAgentOrganizationalReportData(array{reportId?: string, format?: 'CSV'|'JSON'|'PARQUET', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentOrganizationalReportDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentOrganizationalReportDataAsync(array{reportId?: string, format?: 'CSV'|'JSON'|'PARQUET', ...} $args = [])
 * @method \Aws\Result getAgentPreferences(array $args = [])
 * @phpstan-method \Aws\Result getAgentPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result getAgentProfile(array $args = [])
 * @phpstan-method \Aws\Result getAgentProfile(array{profileArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentProfileAsync(array{profileArn?: string, ...} $args = [])
 * @method \Aws\Result getAgentProfilePolicy(array $args = [])
 * @phpstan-method \Aws\Result getAgentProfilePolicy(array{profileArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentProfilePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentProfilePolicyAsync(array{profileArn?: string, ...} $args = [])
 * @method \Aws\Result getAgentRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getAgentRecommendation(array{recommendationArn?: string, remediationType?: 'AUTO_REMEDIATION'|'CLI'|'CONSOLE'|'IAC'|'MCP'|'SDK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentRecommendationAsync(array{recommendationArn?: string, remediationType?: 'AUTO_REMEDIATION'|'CLI'|'CONSOLE'|'IAC'|'MCP'|'SDK', ...} $args = [])
 * @method \Aws\Result getAgentRecommendationGeneration(array $args = [])
 * @phpstan-method \Aws\Result getAgentRecommendationGeneration(array{profileArn?: string, generationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentRecommendationGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentRecommendationGenerationAsync(array{profileArn?: string, generationId?: string, ...} $args = [])
 * @method \Aws\Result getAgentRecommendationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAgentRecommendationPolicy(array{recommendationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentRecommendationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentRecommendationPolicyAsync(array{recommendationArn?: string, ...} $args = [])
 * @method \Aws\Result getAnswer(array $args = [])
 * @phpstan-method \Aws\Result getAnswer(array{WorkloadId?: string, LensAlias?: string, QuestionId?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnswerAsync(array{WorkloadId?: string, LensAlias?: string, QuestionId?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \Aws\Result getConsolidatedReport(array $args = [])
 * @phpstan-method \Aws\Result getConsolidatedReport(array{Format?: 'JSON'|'PDF', IncludeSharedResources?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConsolidatedReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConsolidatedReportAsync(array{Format?: 'JSON'|'PDF', IncludeSharedResources?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result getGlobalSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getLens(array $args = [])
 * @phpstan-method \Aws\Result getLens(array{LensAlias?: string, LensVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLensAsync(array{LensAlias?: string, LensVersion?: string, ...} $args = [])
 * @method \Aws\Result getLensReview(array $args = [])
 * @phpstan-method \Aws\Result getLensReview(array{WorkloadId?: string, LensAlias?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLensReviewAsync(array{WorkloadId?: string, LensAlias?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \Aws\Result getLensReviewReport(array $args = [])
 * @phpstan-method \Aws\Result getLensReviewReport(array{WorkloadId?: string, LensAlias?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLensReviewReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLensReviewReportAsync(array{WorkloadId?: string, LensAlias?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \Aws\Result getLensVersionDifference(array $args = [])
 * @phpstan-method \Aws\Result getLensVersionDifference(array{LensAlias?: string, BaseLensVersion?: string, TargetLensVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLensVersionDifferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLensVersionDifferenceAsync(array{LensAlias?: string, BaseLensVersion?: string, TargetLensVersion?: string, ...} $args = [])
 * @method \Aws\Result getMilestone(array $args = [])
 * @phpstan-method \Aws\Result getMilestone(array{WorkloadId?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMilestoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMilestoneAsync(array{WorkloadId?: string, MilestoneNumber?: int, ...} $args = [])
 * @method \Aws\Result getProfile(array $args = [])
 * @phpstan-method \Aws\Result getProfile(array{ProfileArn?: string, ProfileVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileAsync(array{ProfileArn?: string, ProfileVersion?: string, ...} $args = [])
 * @method \Aws\Result getProfileTemplate(array $args = [])
 * @phpstan-method \Aws\Result getProfileTemplate(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileTemplateAsync(array{...} $args = [])
 * @method \Aws\Result getReviewTemplate(array $args = [])
 * @phpstan-method \Aws\Result getReviewTemplate(array{TemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReviewTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReviewTemplateAsync(array{TemplateArn?: string, ...} $args = [])
 * @method \Aws\Result getReviewTemplateAnswer(array $args = [])
 * @phpstan-method \Aws\Result getReviewTemplateAnswer(array{TemplateArn?: string, LensAlias?: string, QuestionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReviewTemplateAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReviewTemplateAnswerAsync(array{TemplateArn?: string, LensAlias?: string, QuestionId?: string, ...} $args = [])
 * @method \Aws\Result getReviewTemplateLensReview(array $args = [])
 * @phpstan-method \Aws\Result getReviewTemplateLensReview(array{TemplateArn?: string, LensAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReviewTemplateLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReviewTemplateLensReviewAsync(array{TemplateArn?: string, LensAlias?: string, ...} $args = [])
 * @method \Aws\Result getWorkload(array $args = [])
 * @phpstan-method \Aws\Result getWorkload(array{WorkloadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadAsync(array{WorkloadId?: string, ...} $args = [])
 * @method \Aws\Result importLens(array $args = [])
 * @phpstan-method \Aws\Result importLens(array{LensAlias?: string, JSONString?: string, ClientRequestToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importLensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importLensAsync(array{LensAlias?: string, JSONString?: string, ClientRequestToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listAgentContexts(array $args = [])
 * @phpstan-method \Aws\Result listAgentContexts(array{profileArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentContextsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentContextsAsync(array{profileArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentGoals(array $args = [])
 * @phpstan-method \Aws\Result listAgentGoals(array{profileArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentGoalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentGoalsAsync(array{profileArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentOrganizationalReports(array $args = [])
 * @phpstan-method \Aws\Result listAgentOrganizationalReports(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'AGGREGATING'|'COMPLETED'|'COMPRESSING'|'DELETING'|'DISCOVERING'|'FAILED'|'SNAPSHOTTING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentOrganizationalReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentOrganizationalReportsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'AGGREGATING'|'COMPLETED'|'COMPRESSING'|'DELETING'|'DISCOVERING'|'FAILED'|'SNAPSHOTTING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgentProfiles(array $args = [])
 * @phpstan-method \Aws\Result listAgentProfiles(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentProfilesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentRecommendationGenerations(array $args = [])
 * @phpstan-method \Aws\Result listAgentRecommendationGenerations(array{
 *     profileArn?: string,
 *     recommendationType?: 'APPLICATION'|'ARCHITECTURE'|'RESOURCE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRecommendationGenerationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRecommendationGenerationsAsync(array{
 *     profileArn?: string,
 *     recommendationType?: 'APPLICATION'|'ARCHITECTURE'|'RESOURCE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgentRecommendationItems(array $args = [])
 * @phpstan-method \Aws\Result listAgentRecommendationItems(array{
 *     recommendationArn?: string,
 *     type?: 'AWS_RESOURCE'|'RECOMMENDATION',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRecommendationItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRecommendationItemsAsync(array{
 *     recommendationArn?: string,
 *     type?: 'AWS_RESOURCE'|'RECOMMENDATION',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgentRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listAgentRecommendations(array{
 *     profileArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'CLOSED'|'OPEN',
 *     pillar?: 'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRecommendationsAsync(array{
 *     profileArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'CLOSED'|'OPEN',
 *     pillar?: 'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnswers(array $args = [])
 * @phpstan-method \Aws\Result listAnswers(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     PillarId?: string,
 *     MilestoneNumber?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuestionPriority?: 'NONE'|'PRIORITIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnswersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnswersAsync(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     PillarId?: string,
 *     MilestoneNumber?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuestionPriority?: 'NONE'|'PRIORITIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCheckDetails(array $args = [])
 * @phpstan-method \Aws\Result listCheckDetails(array{
 *     WorkloadId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensArn?: string,
 *     PillarId?: string,
 *     QuestionId?: string,
 *     ChoiceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCheckDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCheckDetailsAsync(array{
 *     WorkloadId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensArn?: string,
 *     PillarId?: string,
 *     QuestionId?: string,
 *     ChoiceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCheckSummaries(array $args = [])
 * @phpstan-method \Aws\Result listCheckSummaries(array{
 *     WorkloadId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensArn?: string,
 *     PillarId?: string,
 *     QuestionId?: string,
 *     ChoiceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCheckSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCheckSummariesAsync(array{
 *     WorkloadId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensArn?: string,
 *     PillarId?: string,
 *     QuestionId?: string,
 *     ChoiceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLensReviewImprovements(array $args = [])
 * @phpstan-method \Aws\Result listLensReviewImprovements(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     PillarId?: string,
 *     MilestoneNumber?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuestionPriority?: 'NONE'|'PRIORITIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLensReviewImprovementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLensReviewImprovementsAsync(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     PillarId?: string,
 *     MilestoneNumber?: int,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuestionPriority?: 'NONE'|'PRIORITIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLensReviews(array $args = [])
 * @phpstan-method \Aws\Result listLensReviews(array{WorkloadId?: string, MilestoneNumber?: int, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLensReviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLensReviewsAsync(array{WorkloadId?: string, MilestoneNumber?: int, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listLensShares(array $args = [])
 * @phpstan-method \Aws\Result listLensShares(array{
 *     LensAlias?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLensSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLensSharesAsync(array{
 *     LensAlias?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLenses(array $args = [])
 * @phpstan-method \Aws\Result listLenses(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensType?: 'AWS_OFFICIAL'|'CUSTOM_SELF'|'CUSTOM_SHARED',
 *     LensStatus?: 'ALL'|'DRAFT'|'PUBLISHED',
 *     LensName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLensesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLensesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LensType?: 'AWS_OFFICIAL'|'CUSTOM_SELF'|'CUSTOM_SHARED',
 *     LensStatus?: 'ALL'|'DRAFT'|'PUBLISHED',
 *     LensName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMilestones(array $args = [])
 * @phpstan-method \Aws\Result listMilestones(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMilestonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMilestonesAsync(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listNotifications(array $args = [])
 * @phpstan-method \Aws\Result listNotifications(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationsAsync(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listProfileNotifications(array $args = [])
 * @phpstan-method \Aws\Result listProfileNotifications(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileNotificationsAsync(array{WorkloadId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProfileShares(array $args = [])
 * @phpstan-method \Aws\Result listProfileShares(array{
 *     ProfileArn?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileSharesAsync(array{
 *     ProfileArn?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProfiles(array{
 *     ProfileNamePrefix?: string,
 *     ProfileOwnerType?: 'SELF'|'SHARED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilesAsync(array{
 *     ProfileNamePrefix?: string,
 *     ProfileOwnerType?: 'SELF'|'SHARED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReviewTemplateAnswers(array $args = [])
 * @phpstan-method \Aws\Result listReviewTemplateAnswers(array{TemplateArn?: string, LensAlias?: string, PillarId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReviewTemplateAnswersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReviewTemplateAnswersAsync(array{TemplateArn?: string, LensAlias?: string, PillarId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listReviewTemplates(array $args = [])
 * @phpstan-method \Aws\Result listReviewTemplates(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReviewTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReviewTemplatesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listShareInvitations(array $args = [])
 * @phpstan-method \Aws\Result listShareInvitations(array{
 *     WorkloadNamePrefix?: string,
 *     LensNamePrefix?: string,
 *     ShareResourceType?: 'LENS'|'PROFILE'|'TEMPLATE'|'WORKLOAD',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProfileNamePrefix?: string,
 *     TemplateNamePrefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listShareInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listShareInvitationsAsync(array{
 *     WorkloadNamePrefix?: string,
 *     LensNamePrefix?: string,
 *     ShareResourceType?: 'LENS'|'PROFILE'|'TEMPLATE'|'WORKLOAD',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProfileNamePrefix?: string,
 *     TemplateNamePrefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{WorkloadArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{WorkloadArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateShares(array $args = [])
 * @phpstan-method \Aws\Result listTemplateShares(array{
 *     TemplateArn?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateSharesAsync(array{
 *     TemplateArn?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkloadShares(array $args = [])
 * @phpstan-method \Aws\Result listWorkloadShares(array{
 *     WorkloadId?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadSharesAsync(array{
 *     WorkloadId?: string,
 *     SharedWithPrefix?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACCEPTED'|'ASSOCIATED'|'ASSOCIATING'|'EXPIRED'|'FAILED'|'PENDING'|'REJECTED'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkloads(array $args = [])
 * @phpstan-method \Aws\Result listWorkloads(array{WorkloadNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array{WorkloadNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putAgentPreferences(array $args = [])
 * @phpstan-method \Aws\Result putAgentPreferences(array{preferences?: list<array{key?: 'ORG_INTEGRATION', state?: 'DISABLED'|'ENABLED', ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAgentPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAgentPreferencesAsync(array{preferences?: list<array{key?: 'ORG_INTEGRATION', state?: 'DISABLED'|'ENABLED', ...}>, ...} $args = [])
 * @method \Aws\Result putAgentProfilePolicy(array $args = [])
 * @phpstan-method \Aws\Result putAgentProfilePolicy(array{profileArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAgentProfilePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAgentProfilePolicyAsync(array{profileArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putAgentRecommendationFeedback(array $args = [])
 * @phpstan-method \Aws\Result putAgentRecommendationFeedback(array{
 *     recommendationArn?: string,
 *     type?: 'NOT_USEFUL'|'USEFUL',
 *     feedbackCategory?: 'OTHER'|'RECOMMENDATION_INCORRECT'|'RECOMMENDATION_NOT_RELEVANT'|'RESOURCE_NOT_IMPORTANT'|'RESOURCE_TYPE_NOT_IMPORTANT',
 *     comments?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAgentRecommendationFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAgentRecommendationFeedbackAsync(array{
 *     recommendationArn?: string,
 *     type?: 'NOT_USEFUL'|'USEFUL',
 *     feedbackCategory?: 'OTHER'|'RECOMMENDATION_INCORRECT'|'RECOMMENDATION_NOT_RELEVANT'|'RESOURCE_NOT_IMPORTANT'|'RESOURCE_TYPE_NOT_IMPORTANT',
 *     comments?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAgentRecommendationPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAgentRecommendationPolicy(array{recommendationArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAgentRecommendationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAgentRecommendationPolicyAsync(array{recommendationArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result sendAgentOrganizationalReportDataToS3(array $args = [])
 * @phpstan-method \Aws\Result sendAgentOrganizationalReportDataToS3(array{reportId?: string, format?: 'CSV'|'JSON'|'PARQUET', bucketArn?: string, objectKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAgentOrganizationalReportDataToS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAgentOrganizationalReportDataToS3Async(array{reportId?: string, format?: 'CSV'|'JSON'|'PARQUET', bucketArn?: string, objectKey?: string, ...} $args = [])
 * @method \Aws\Result startAgentRecommendationGeneration(array $args = [])
 * @phpstan-method \Aws\Result startAgentRecommendationGeneration(array{
 *     profileArn?: string,
 *     types?: list<'APPLICATION'|'ARCHITECTURE'|'RESOURCE'>,
 *     name?: string,
 *     additionalContext?: array,
 *     scope?: array{
 *         pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *         goalIds?: list<string>,
 *         items?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAgentRecommendationGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAgentRecommendationGenerationAsync(array{
 *     profileArn?: string,
 *     types?: list<'APPLICATION'|'ARCHITECTURE'|'RESOURCE'>,
 *     name?: string,
 *     additionalContext?: array,
 *     scope?: array{
 *         pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *         goalIds?: list<string>,
 *         items?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{WorkloadArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{WorkloadArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{WorkloadArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{WorkloadArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgentContext(array $args = [])
 * @phpstan-method \Aws\Result updateAgentContext(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     id?: string,
 *     title?: string,
 *     content?: array{
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         awsServices?: list<string>,
 *         resourceTypes?: list<string>,
 *         resourceTags?: list<array>,
 *         organizationalUnitIds?: list<string>,
 *         applicationOverview?: string,
 *         industry?: string,
 *         applicationType?: 'DESKTOP_APPLICATION'|'OTHER'|'SAS',
 *         criticality?: 'BUSINESS_CRITICAL'|'MISSION_CRITICAL'|'NON_CRITICAL'|'TEST_DEVELOPMENT',
 *         architectureOverview?: string,
 *         additionalContext?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentContextAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     id?: string,
 *     title?: string,
 *     content?: array{
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         awsServices?: list<string>,
 *         resourceTypes?: list<string>,
 *         resourceTags?: list<array>,
 *         organizationalUnitIds?: list<string>,
 *         applicationOverview?: string,
 *         industry?: string,
 *         applicationType?: 'DESKTOP_APPLICATION'|'OTHER'|'SAS',
 *         criticality?: 'BUSINESS_CRITICAL'|'MISSION_CRITICAL'|'NON_CRITICAL'|'TEST_DEVELOPMENT',
 *         architectureOverview?: string,
 *         additionalContext?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentGoal(array $args = [])
 * @phpstan-method \Aws\Result updateAgentGoal(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     id?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     title?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentGoalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentGoalAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     id?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     title?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentOrganizationalProfile(array $args = [])
 * @phpstan-method \Aws\Result updateAgentOrganizationalProfile(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     organizationalAggregationConfiguration?: array{organizationalUnits?: list<array>, accounts?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentOrganizationalProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentOrganizationalProfileAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     organizationalAggregationConfiguration?: array{organizationalUnits?: list<array>, accounts?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentProfile(array $args = [])
 * @phpstan-method \Aws\Result updateAgentProfile(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     aggregationConfiguration?: list<array{accountId?: string, regions?: list<string>, accessRoleArn?: string, ...}>,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentProfileAsync(array{
 *     clientToken?: string,
 *     profileArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     aggregationConfiguration?: list<array{accountId?: string, regions?: list<string>, accessRoleArn?: string, ...}>,
 *     businessOverview?: string,
 *     pillars?: list<'COST_OPTIMIZATION'|'OPERATIONAL_EXCELLENCE'|'PERFORMANCE'|'RESILIENCE'|'SECURITY'>,
 *     deletionProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentRecommendationStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAgentRecommendationStatus(array{recommendationArn?: string, status?: 'ACTIVE'|'COMPLETED'|'SUPPRESSED', updateReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentRecommendationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentRecommendationStatusAsync(array{recommendationArn?: string, status?: 'ACTIVE'|'COMPLETED'|'SUPPRESSED', updateReason?: string, ...} $args = [])
 * @method \Aws\Result updateAnswer(array $args = [])
 * @phpstan-method \Aws\Result updateAnswer(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     QuestionId?: string,
 *     SelectedChoices?: list<string>,
 *     ChoiceUpdates?: array<string, array{
 *         Status?: 'NOT_APPLICABLE'|'SELECTED'|'UNSELECTED',
 *         Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *         Notes?: string,
 *         ...,
 *     }>,
 *     Notes?: string,
 *     IsApplicable?: bool,
 *     Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnswerAsync(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     QuestionId?: string,
 *     SelectedChoices?: list<string>,
 *     ChoiceUpdates?: array<string, array{
 *         Status?: 'NOT_APPLICABLE'|'SELECTED'|'UNSELECTED',
 *         Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *         Notes?: string,
 *         ...,
 *     }>,
 *     Notes?: string,
 *     IsApplicable?: bool,
 *     Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalSettings(array{
 *     OrganizationSharingStatus?: 'DISABLED'|'ENABLED',
 *     DiscoveryIntegrationStatus?: 'DISABLED'|'ENABLED',
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         IntegrationStatus?: 'NOT_CONFIGURED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array{
 *     OrganizationSharingStatus?: 'DISABLED'|'ENABLED',
 *     DiscoveryIntegrationStatus?: 'DISABLED'|'ENABLED',
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         IntegrationStatus?: 'NOT_CONFIGURED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateIntegration(array{WorkloadId?: string, ClientRequestToken?: string, IntegratingService?: 'JIRA', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array{WorkloadId?: string, ClientRequestToken?: string, IntegratingService?: 'JIRA', ...} $args = [])
 * @method \Aws\Result updateLensReview(array $args = [])
 * @phpstan-method \Aws\Result updateLensReview(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     LensNotes?: string,
 *     PillarNotes?: array<string, string>,
 *     JiraConfiguration?: array{SelectedPillars?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLensReviewAsync(array{
 *     WorkloadId?: string,
 *     LensAlias?: string,
 *     LensNotes?: string,
 *     PillarNotes?: array<string, string>,
 *     JiraConfiguration?: array{SelectedPillars?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProfile(array $args = [])
 * @phpstan-method \Aws\Result updateProfile(array{
 *     ProfileArn?: string,
 *     ProfileDescription?: string,
 *     ProfileQuestions?: list<array{QuestionId?: string, SelectedChoiceIds?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileAsync(array{
 *     ProfileArn?: string,
 *     ProfileDescription?: string,
 *     ProfileQuestions?: list<array{QuestionId?: string, SelectedChoiceIds?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReviewTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateReviewTemplate(array{
 *     TemplateArn?: string,
 *     TemplateName?: string,
 *     Description?: string,
 *     Notes?: string,
 *     LensesToAssociate?: list<string>,
 *     LensesToDisassociate?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReviewTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReviewTemplateAsync(array{
 *     TemplateArn?: string,
 *     TemplateName?: string,
 *     Description?: string,
 *     Notes?: string,
 *     LensesToAssociate?: list<string>,
 *     LensesToDisassociate?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReviewTemplateAnswer(array $args = [])
 * @phpstan-method \Aws\Result updateReviewTemplateAnswer(array{
 *     TemplateArn?: string,
 *     LensAlias?: string,
 *     QuestionId?: string,
 *     SelectedChoices?: list<string>,
 *     ChoiceUpdates?: array<string, array{
 *         Status?: 'NOT_APPLICABLE'|'SELECTED'|'UNSELECTED',
 *         Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *         Notes?: string,
 *         ...,
 *     }>,
 *     Notes?: string,
 *     IsApplicable?: bool,
 *     Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReviewTemplateAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReviewTemplateAnswerAsync(array{
 *     TemplateArn?: string,
 *     LensAlias?: string,
 *     QuestionId?: string,
 *     SelectedChoices?: list<string>,
 *     ChoiceUpdates?: array<string, array{
 *         Status?: 'NOT_APPLICABLE'|'SELECTED'|'UNSELECTED',
 *         Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *         Notes?: string,
 *         ...,
 *     }>,
 *     Notes?: string,
 *     IsApplicable?: bool,
 *     Reason?: 'ARCHITECTURE_CONSTRAINTS'|'BUSINESS_PRIORITIES'|'NONE'|'OTHER'|'OUT_OF_SCOPE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReviewTemplateLensReview(array $args = [])
 * @phpstan-method \Aws\Result updateReviewTemplateLensReview(array{TemplateArn?: string, LensAlias?: string, LensNotes?: string, PillarNotes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReviewTemplateLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReviewTemplateLensReviewAsync(array{TemplateArn?: string, LensAlias?: string, LensNotes?: string, PillarNotes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateShareInvitation(array $args = [])
 * @phpstan-method \Aws\Result updateShareInvitation(array{ShareInvitationId?: string, ShareInvitationAction?: 'ACCEPT'|'REJECT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateShareInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateShareInvitationAsync(array{ShareInvitationId?: string, ShareInvitationAction?: 'ACCEPT'|'REJECT', ...} $args = [])
 * @method \Aws\Result updateWorkload(array $args = [])
 * @phpstan-method \Aws\Result updateWorkload(array{
 *     WorkloadId?: string,
 *     WorkloadName?: string,
 *     Description?: string,
 *     Environment?: 'PREPRODUCTION'|'PRODUCTION',
 *     AccountIds?: list<string>,
 *     AwsRegions?: list<string>,
 *     NonAwsRegions?: list<string>,
 *     PillarPriorities?: list<string>,
 *     ArchitecturalDesign?: string,
 *     ReviewOwner?: string,
 *     IsReviewOwnerUpdateAcknowledged?: bool,
 *     IndustryType?: string,
 *     Industry?: string,
 *     Notes?: string,
 *     ImprovementStatus?: 'COMPLETE'|'IN_PROGRESS'|'NOT_APPLICABLE'|'NOT_STARTED'|'RISK_ACKNOWLEDGED',
 *     DiscoveryConfig?: array{
 *         TrustedAdvisorIntegrationStatus?: 'DISABLED'|'ENABLED',
 *         WorkloadResourceDefinition?: list<'APP_REGISTRY'|'WORKLOAD_METADATA'>,
 *         ...,
 *     },
 *     Applications?: list<string>,
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED'|'INHERIT',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkloadAsync(array{
 *     WorkloadId?: string,
 *     WorkloadName?: string,
 *     Description?: string,
 *     Environment?: 'PREPRODUCTION'|'PRODUCTION',
 *     AccountIds?: list<string>,
 *     AwsRegions?: list<string>,
 *     NonAwsRegions?: list<string>,
 *     PillarPriorities?: list<string>,
 *     ArchitecturalDesign?: string,
 *     ReviewOwner?: string,
 *     IsReviewOwnerUpdateAcknowledged?: bool,
 *     IndustryType?: string,
 *     Industry?: string,
 *     Notes?: string,
 *     ImprovementStatus?: 'COMPLETE'|'IN_PROGRESS'|'NOT_APPLICABLE'|'NOT_STARTED'|'RISK_ACKNOWLEDGED',
 *     DiscoveryConfig?: array{
 *         TrustedAdvisorIntegrationStatus?: 'DISABLED'|'ENABLED',
 *         WorkloadResourceDefinition?: list<'APP_REGISTRY'|'WORKLOAD_METADATA'>,
 *         ...,
 *     },
 *     Applications?: list<string>,
 *     JiraConfiguration?: array{
 *         IssueManagementStatus?: 'DISABLED'|'ENABLED'|'INHERIT',
 *         IssueManagementType?: 'AUTO'|'MANUAL',
 *         JiraProjectKey?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkloadShare(array $args = [])
 * @phpstan-method \Aws\Result updateWorkloadShare(array{ShareId?: string, WorkloadId?: string, PermissionType?: 'CONTRIBUTOR'|'READONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkloadShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkloadShareAsync(array{ShareId?: string, WorkloadId?: string, PermissionType?: 'CONTRIBUTOR'|'READONLY', ...} $args = [])
 * @method \Aws\Result upgradeLensReview(array $args = [])
 * @phpstan-method \Aws\Result upgradeLensReview(array{WorkloadId?: string, LensAlias?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeLensReviewAsync(array{WorkloadId?: string, LensAlias?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result upgradeProfileVersion(array $args = [])
 * @phpstan-method \Aws\Result upgradeProfileVersion(array{WorkloadId?: string, ProfileArn?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeProfileVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeProfileVersionAsync(array{WorkloadId?: string, ProfileArn?: string, MilestoneName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result upgradeReviewTemplateLensReview(array $args = [])
 * @phpstan-method \Aws\Result upgradeReviewTemplateLensReview(array{TemplateArn?: string, LensAlias?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeReviewTemplateLensReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeReviewTemplateLensReviewAsync(array{TemplateArn?: string, LensAlias?: string, ClientRequestToken?: string, ...} $args = [])
 */
class WellArchitectedClient extends AwsClient {}
