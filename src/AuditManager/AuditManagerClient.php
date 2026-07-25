<?php
namespace Aws\AuditManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Audit Manager** service.
 * @method \Aws\Result associateAssessmentReportEvidenceFolder(array $args = [])
 * @phpstan-method \Aws\Result associateAssessmentReportEvidenceFolder(array{assessmentId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAssessmentReportEvidenceFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAssessmentReportEvidenceFolderAsync(array{assessmentId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateAssessmentReportEvidence(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateAssessmentReportEvidence(array{assessmentId?: string, evidenceFolderId?: string, evidenceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateAssessmentReportEvidenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateAssessmentReportEvidenceAsync(array{assessmentId?: string, evidenceFolderId?: string, evidenceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchCreateDelegationByAssessment(array $args = [])
 * @phpstan-method \Aws\Result batchCreateDelegationByAssessment(array{
 *     createDelegationRequests?: list<array{
 *         comment?: string,
 *         controlSetId?: string,
 *         roleArn?: string,
 *         roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER',
 *         ...,
 *     }>,
 *     assessmentId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateDelegationByAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateDelegationByAssessmentAsync(array{
 *     createDelegationRequests?: list<array{
 *         comment?: string,
 *         controlSetId?: string,
 *         roleArn?: string,
 *         roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER',
 *         ...,
 *     }>,
 *     assessmentId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteDelegationByAssessment(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDelegationByAssessment(array{delegationIds?: list<string>, assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDelegationByAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDelegationByAssessmentAsync(array{delegationIds?: list<string>, assessmentId?: string, ...} $args = [])
 * @method \Aws\Result batchDisassociateAssessmentReportEvidence(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateAssessmentReportEvidence(array{assessmentId?: string, evidenceFolderId?: string, evidenceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateAssessmentReportEvidenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateAssessmentReportEvidenceAsync(array{assessmentId?: string, evidenceFolderId?: string, evidenceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchImportEvidenceToAssessmentControl(array $args = [])
 * @phpstan-method \Aws\Result batchImportEvidenceToAssessmentControl(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     manualEvidence?: list<array{s3ResourcePath?: string, textResponse?: string, evidenceFileName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchImportEvidenceToAssessmentControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchImportEvidenceToAssessmentControlAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     manualEvidence?: list<array{s3ResourcePath?: string, textResponse?: string, evidenceFileName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssessment(array $args = [])
 * @phpstan-method \Aws\Result createAssessment(array{
 *     name?: string,
 *     description?: string,
 *     assessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     scope?: array{awsAccounts?: list<array>, awsServices?: list<array>, ...},
 *     roles?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     frameworkId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssessmentAsync(array{
 *     name?: string,
 *     description?: string,
 *     assessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     scope?: array{awsAccounts?: list<array>, awsServices?: list<array>, ...},
 *     roles?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     frameworkId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssessmentFramework(array $args = [])
 * @phpstan-method \Aws\Result createAssessmentFramework(array{
 *     name?: string,
 *     description?: string,
 *     complianceType?: string,
 *     controlSets?: list<array{name?: string, controls?: list<array>, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssessmentFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssessmentFrameworkAsync(array{
 *     name?: string,
 *     description?: string,
 *     complianceType?: string,
 *     controlSets?: list<array{name?: string, controls?: list<array>, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssessmentReport(array $args = [])
 * @phpstan-method \Aws\Result createAssessmentReport(array{name?: string, description?: string, assessmentId?: string, queryStatement?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssessmentReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssessmentReportAsync(array{name?: string, description?: string, assessmentId?: string, queryStatement?: string, ...} $args = [])
 * @method \Aws\Result createControl(array $args = [])
 * @phpstan-method \Aws\Result createControl(array{
 *     name?: string,
 *     description?: string,
 *     testingInformation?: string,
 *     actionPlanTitle?: string,
 *     actionPlanInstructions?: string,
 *     controlMappingSources?: list<array{
 *         sourceName?: string,
 *         sourceDescription?: string,
 *         sourceSetUpOption?: 'Procedural_Controls_Mapping'|'System_Controls_Mapping',
 *         sourceType?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'Common_Control'|'Core_Control'|'MANUAL',
 *         sourceKeyword?: array,
 *         sourceFrequency?: 'DAILY'|'MONTHLY'|'WEEKLY',
 *         troubleshootingText?: string,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createControlAsync(array{
 *     name?: string,
 *     description?: string,
 *     testingInformation?: string,
 *     actionPlanTitle?: string,
 *     actionPlanInstructions?: string,
 *     controlMappingSources?: list<array{
 *         sourceName?: string,
 *         sourceDescription?: string,
 *         sourceSetUpOption?: 'Procedural_Controls_Mapping'|'System_Controls_Mapping',
 *         sourceType?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'Common_Control'|'Core_Control'|'MANUAL',
 *         sourceKeyword?: array,
 *         sourceFrequency?: 'DAILY'|'MONTHLY'|'WEEKLY',
 *         troubleshootingText?: string,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAssessment(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessment(array{assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentAsync(array{assessmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssessmentFramework(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentFramework(array{frameworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentFrameworkAsync(array{frameworkId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssessmentFrameworkShare(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentFrameworkShare(array{requestId?: string, requestType?: 'RECEIVED'|'SENT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentFrameworkShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentFrameworkShareAsync(array{requestId?: string, requestType?: 'RECEIVED'|'SENT', ...} $args = [])
 * @method \Aws\Result deleteAssessmentReport(array $args = [])
 * @phpstan-method \Aws\Result deleteAssessmentReport(array{assessmentId?: string, assessmentReportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssessmentReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssessmentReportAsync(array{assessmentId?: string, assessmentReportId?: string, ...} $args = [])
 * @method \Aws\Result deleteControl(array $args = [])
 * @phpstan-method \Aws\Result deleteControl(array{controlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteControlAsync(array{controlId?: string, ...} $args = [])
 * @method \Aws\Result deregisterAccount(array $args = [])
 * @phpstan-method \Aws\Result deregisterAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterAccountAsync(array{...} $args = [])
 * @method \Aws\Result deregisterOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result deregisterOrganizationAdminAccount(array{adminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterOrganizationAdminAccountAsync(array{adminAccountId?: string, ...} $args = [])
 * @method \Aws\Result disassociateAssessmentReportEvidenceFolder(array $args = [])
 * @phpstan-method \Aws\Result disassociateAssessmentReportEvidenceFolder(array{assessmentId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAssessmentReportEvidenceFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAssessmentReportEvidenceFolderAsync(array{assessmentId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \Aws\Result getAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result getAccountStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountStatusAsync(array{...} $args = [])
 * @method \Aws\Result getAssessment(array $args = [])
 * @phpstan-method \Aws\Result getAssessment(array{assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssessmentAsync(array{assessmentId?: string, ...} $args = [])
 * @method \Aws\Result getAssessmentFramework(array $args = [])
 * @phpstan-method \Aws\Result getAssessmentFramework(array{frameworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssessmentFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssessmentFrameworkAsync(array{frameworkId?: string, ...} $args = [])
 * @method \Aws\Result getAssessmentReportUrl(array $args = [])
 * @phpstan-method \Aws\Result getAssessmentReportUrl(array{assessmentReportId?: string, assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssessmentReportUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssessmentReportUrlAsync(array{assessmentReportId?: string, assessmentId?: string, ...} $args = [])
 * @method \Aws\Result getChangeLogs(array $args = [])
 * @phpstan-method \Aws\Result getChangeLogs(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChangeLogsAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getControl(array $args = [])
 * @phpstan-method \Aws\Result getControl(array{controlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getControlAsync(array{controlId?: string, ...} $args = [])
 * @method \Aws\Result getDelegations(array $args = [])
 * @phpstan-method \Aws\Result getDelegations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDelegationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDelegationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getEvidence(array $args = [])
 * @phpstan-method \Aws\Result getEvidence(array{assessmentId?: string, controlSetId?: string, evidenceFolderId?: string, evidenceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceAsync(array{assessmentId?: string, controlSetId?: string, evidenceFolderId?: string, evidenceId?: string, ...} $args = [])
 * @method \Aws\Result getEvidenceByEvidenceFolder(array $args = [])
 * @phpstan-method \Aws\Result getEvidenceByEvidenceFolder(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     evidenceFolderId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceByEvidenceFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceByEvidenceFolderAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     evidenceFolderId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEvidenceFileUploadUrl(array $args = [])
 * @phpstan-method \Aws\Result getEvidenceFileUploadUrl(array{fileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceFileUploadUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceFileUploadUrlAsync(array{fileName?: string, ...} $args = [])
 * @method \Aws\Result getEvidenceFolder(array $args = [])
 * @phpstan-method \Aws\Result getEvidenceFolder(array{assessmentId?: string, controlSetId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceFolderAsync(array{assessmentId?: string, controlSetId?: string, evidenceFolderId?: string, ...} $args = [])
 * @method \Aws\Result getEvidenceFoldersByAssessment(array $args = [])
 * @phpstan-method \Aws\Result getEvidenceFoldersByAssessment(array{assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceFoldersByAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceFoldersByAssessmentAsync(array{assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getEvidenceFoldersByAssessmentControl(array $args = [])
 * @phpstan-method \Aws\Result getEvidenceFoldersByAssessmentControl(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvidenceFoldersByAssessmentControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvidenceFoldersByAssessmentControlAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInsights(array $args = [])
 * @phpstan-method \Aws\Result getInsights(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightsAsync(array{...} $args = [])
 * @method \Aws\Result getInsightsByAssessment(array $args = [])
 * @phpstan-method \Aws\Result getInsightsByAssessment(array{assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightsByAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightsByAssessmentAsync(array{assessmentId?: string, ...} $args = [])
 * @method \Aws\Result getOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result getOrganizationAdminAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrganizationAdminAccountAsync(array{...} $args = [])
 * @method \Aws\Result getServicesInScope(array $args = [])
 * @phpstan-method \Aws\Result getServicesInScope(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServicesInScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServicesInScopeAsync(array{...} $args = [])
 * @method \Aws\Result getSettings(array $args = [])
 * @phpstan-method \Aws\Result getSettings(array{
 *     attribute?: 'ALL'|'DEFAULT_ASSESSMENT_REPORTS_DESTINATION'|'DEFAULT_EXPORT_DESTINATION'|'DEFAULT_PROCESS_OWNERS'|'DEREGISTRATION_POLICY'|'EVIDENCE_FINDER_ENABLEMENT'|'IS_AWS_ORG_ENABLED'|'SNS_TOPIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSettingsAsync(array{
 *     attribute?: 'ALL'|'DEFAULT_ASSESSMENT_REPORTS_DESTINATION'|'DEFAULT_EXPORT_DESTINATION'|'DEFAULT_PROCESS_OWNERS'|'DEREGISTRATION_POLICY'|'EVIDENCE_FINDER_ENABLEMENT'|'IS_AWS_ORG_ENABLED'|'SNS_TOPIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssessmentControlInsightsByControlDomain(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentControlInsightsByControlDomain(array{controlDomainId?: string, assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentControlInsightsByControlDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentControlInsightsByControlDomainAsync(array{controlDomainId?: string, assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssessmentFrameworkShareRequests(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentFrameworkShareRequests(array{requestType?: 'RECEIVED'|'SENT', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentFrameworkShareRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentFrameworkShareRequestsAsync(array{requestType?: 'RECEIVED'|'SENT', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssessmentFrameworks(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentFrameworks(array{frameworkType?: 'Custom'|'Standard', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentFrameworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentFrameworksAsync(array{frameworkType?: 'Custom'|'Standard', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssessmentReports(array $args = [])
 * @phpstan-method \Aws\Result listAssessmentReports(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentReportsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssessments(array $args = [])
 * @phpstan-method \Aws\Result listAssessments(array{status?: 'ACTIVE'|'INACTIVE', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssessmentsAsync(array{status?: 'ACTIVE'|'INACTIVE', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listControlDomainInsights(array $args = [])
 * @phpstan-method \Aws\Result listControlDomainInsights(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlDomainInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlDomainInsightsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listControlDomainInsightsByAssessment(array $args = [])
 * @phpstan-method \Aws\Result listControlDomainInsightsByAssessment(array{assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlDomainInsightsByAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlDomainInsightsByAssessmentAsync(array{assessmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listControlInsightsByControlDomain(array $args = [])
 * @phpstan-method \Aws\Result listControlInsightsByControlDomain(array{controlDomainId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlInsightsByControlDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlInsightsByControlDomainAsync(array{controlDomainId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listControls(array $args = [])
 * @phpstan-method \Aws\Result listControls(array{
 *     controlType?: 'Core'|'Custom'|'Standard',
 *     nextToken?: string,
 *     maxResults?: int,
 *     controlCatalogId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlsAsync(array{
 *     controlType?: 'Core'|'Custom'|'Standard',
 *     nextToken?: string,
 *     maxResults?: int,
 *     controlCatalogId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKeywordsForDataSource(array $args = [])
 * @phpstan-method \Aws\Result listKeywordsForDataSource(array{
 *     source?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'MANUAL',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeywordsForDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeywordsForDataSourceAsync(array{
 *     source?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'MANUAL',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotifications(array $args = [])
 * @phpstan-method \Aws\Result listNotifications(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerAccount(array $args = [])
 * @phpstan-method \Aws\Result registerAccount(array{kmsKey?: string, delegatedAdminAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAccountAsync(array{kmsKey?: string, delegatedAdminAccount?: string, ...} $args = [])
 * @method \Aws\Result registerOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result registerOrganizationAdminAccount(array{adminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOrganizationAdminAccountAsync(array{adminAccountId?: string, ...} $args = [])
 * @method \Aws\Result startAssessmentFrameworkShare(array $args = [])
 * @phpstan-method \Aws\Result startAssessmentFrameworkShare(array{frameworkId?: string, destinationAccount?: string, destinationRegion?: string, comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssessmentFrameworkShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssessmentFrameworkShareAsync(array{frameworkId?: string, destinationAccount?: string, destinationRegion?: string, comment?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAssessment(array $args = [])
 * @phpstan-method \Aws\Result updateAssessment(array{
 *     assessmentId?: string,
 *     assessmentName?: string,
 *     assessmentDescription?: string,
 *     scope?: array{awsAccounts?: list<array>, awsServices?: list<array>, ...},
 *     assessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     roles?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentAsync(array{
 *     assessmentId?: string,
 *     assessmentName?: string,
 *     assessmentDescription?: string,
 *     scope?: array{awsAccounts?: list<array>, awsServices?: list<array>, ...},
 *     assessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     roles?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssessmentControl(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentControl(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     controlStatus?: 'INACTIVE'|'REVIEWED'|'UNDER_REVIEW',
 *     commentBody?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentControlAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     controlId?: string,
 *     controlStatus?: 'INACTIVE'|'REVIEWED'|'UNDER_REVIEW',
 *     commentBody?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssessmentControlSetStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentControlSetStatus(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     status?: 'ACTIVE'|'REVIEWED'|'UNDER_REVIEW',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentControlSetStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentControlSetStatusAsync(array{
 *     assessmentId?: string,
 *     controlSetId?: string,
 *     status?: 'ACTIVE'|'REVIEWED'|'UNDER_REVIEW',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssessmentFramework(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentFramework(array{
 *     frameworkId?: string,
 *     name?: string,
 *     description?: string,
 *     complianceType?: string,
 *     controlSets?: list<array{id?: string, name?: string, controls?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentFrameworkAsync(array{
 *     frameworkId?: string,
 *     name?: string,
 *     description?: string,
 *     complianceType?: string,
 *     controlSets?: list<array{id?: string, name?: string, controls?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssessmentFrameworkShare(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentFrameworkShare(array{requestId?: string, requestType?: 'RECEIVED'|'SENT', action?: 'ACCEPT'|'DECLINE'|'REVOKE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentFrameworkShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentFrameworkShareAsync(array{requestId?: string, requestType?: 'RECEIVED'|'SENT', action?: 'ACCEPT'|'DECLINE'|'REVOKE', ...} $args = [])
 * @method \Aws\Result updateAssessmentStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAssessmentStatus(array{assessmentId?: string, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssessmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssessmentStatusAsync(array{assessmentId?: string, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result updateControl(array $args = [])
 * @phpstan-method \Aws\Result updateControl(array{
 *     controlId?: string,
 *     name?: string,
 *     description?: string,
 *     testingInformation?: string,
 *     actionPlanTitle?: string,
 *     actionPlanInstructions?: string,
 *     controlMappingSources?: list<array{
 *         sourceId?: string,
 *         sourceName?: string,
 *         sourceDescription?: string,
 *         sourceSetUpOption?: 'Procedural_Controls_Mapping'|'System_Controls_Mapping',
 *         sourceType?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'Common_Control'|'Core_Control'|'MANUAL',
 *         sourceKeyword?: array,
 *         sourceFrequency?: 'DAILY'|'MONTHLY'|'WEEKLY',
 *         troubleshootingText?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateControlAsync(array{
 *     controlId?: string,
 *     name?: string,
 *     description?: string,
 *     testingInformation?: string,
 *     actionPlanTitle?: string,
 *     actionPlanInstructions?: string,
 *     controlMappingSources?: list<array{
 *         sourceId?: string,
 *         sourceName?: string,
 *         sourceDescription?: string,
 *         sourceSetUpOption?: 'Procedural_Controls_Mapping'|'System_Controls_Mapping',
 *         sourceType?: 'AWS_API_Call'|'AWS_Cloudtrail'|'AWS_Config'|'AWS_Security_Hub'|'Common_Control'|'Core_Control'|'MANUAL',
 *         sourceKeyword?: array,
 *         sourceFrequency?: 'DAILY'|'MONTHLY'|'WEEKLY',
 *         troubleshootingText?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSettings(array $args = [])
 * @phpstan-method \Aws\Result updateSettings(array{
 *     snsTopic?: string,
 *     defaultAssessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     defaultProcessOwners?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     kmsKey?: string,
 *     evidenceFinderEnabled?: bool,
 *     deregistrationPolicy?: array{deleteResources?: 'ALL'|'DEFAULT', ...},
 *     defaultExportDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSettingsAsync(array{
 *     snsTopic?: string,
 *     defaultAssessmentReportsDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     defaultProcessOwners?: list<array{roleType?: 'PROCESS_OWNER'|'RESOURCE_OWNER', roleArn?: string, ...}>,
 *     kmsKey?: string,
 *     evidenceFinderEnabled?: bool,
 *     deregistrationPolicy?: array{deleteResources?: 'ALL'|'DEFAULT', ...},
 *     defaultExportDestination?: array{destinationType?: 'S3', destination?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateAssessmentReportIntegrity(array $args = [])
 * @phpstan-method \Aws\Result validateAssessmentReportIntegrity(array{s3RelativePath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateAssessmentReportIntegrityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateAssessmentReportIntegrityAsync(array{s3RelativePath?: string, ...} $args = [])
 */
class AuditManagerClient extends AwsClient {}
