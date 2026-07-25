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
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{WorkloadArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{WorkloadArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{WorkloadArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{WorkloadArn?: string, TagKeys?: list<string>, ...} $args = [])
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
