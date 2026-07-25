<?php
namespace Aws\SecurityIR;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Security Incident Response** service.
 * @method \Aws\Result batchGetMemberAccountDetails(array $args = [])
 * @phpstan-method \Aws\Result batchGetMemberAccountDetails(array{membershipId?: string, accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetMemberAccountDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMemberAccountDetailsAsync(array{membershipId?: string, accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelMembership(array $args = [])
 * @phpstan-method \Aws\Result cancelMembership(array{membershipId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMembershipAsync(array{membershipId?: string, ...} $args = [])
 * @method \Aws\Result closeCase(array $args = [])
 * @phpstan-method \Aws\Result closeCase(array{caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise closeCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise closeCaseAsync(array{caseId?: string, ...} $args = [])
 * @method \Aws\Result createCase(array $args = [])
 * @phpstan-method \Aws\Result createCase(array{
 *     clientToken?: string,
 *     resolverType?: 'AWS'|'Self',
 *     title?: string,
 *     description?: string,
 *     engagementType?: 'Investigation'|'Security Incident',
 *     reportedIncidentStartDate?: int|string|\DateTimeInterface,
 *     impactedAccounts?: list<string>,
 *     watchers?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     threatActorIpAddresses?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     impactedServices?: list<string>,
 *     impactedAwsRegions?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCaseAsync(array{
 *     clientToken?: string,
 *     resolverType?: 'AWS'|'Self',
 *     title?: string,
 *     description?: string,
 *     engagementType?: 'Investigation'|'Security Incident',
 *     reportedIncidentStartDate?: int|string|\DateTimeInterface,
 *     impactedAccounts?: list<string>,
 *     watchers?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     threatActorIpAddresses?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     impactedServices?: list<string>,
 *     impactedAwsRegions?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCaseComment(array $args = [])
 * @phpstan-method \Aws\Result createCaseComment(array{caseId?: string, clientToken?: string, body?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCaseCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCaseCommentAsync(array{caseId?: string, clientToken?: string, body?: string, ...} $args = [])
 * @method \Aws\Result createMembership(array $args = [])
 * @phpstan-method \Aws\Result createMembership(array{
 *     clientToken?: string,
 *     membershipName?: string,
 *     incidentResponseTeam?: list<array{
 *         name?: string,
 *         jobTitle?: string,
 *         email?: string,
 *         communicationPreferences?: list<'Case Acknowledged'|'Case Attachment Url Uploaded'|'Case Closed'|'Case Comment Added'|'Case Comment Updated'|'Case Created'|'Case Pending Customer Action Reminder'|'Case Status Updated'|'Case Updated'|'Case Updated To Service Managed'|'Deregister Delegated Administrator'|'Disable AWS Service Access'|'Membership Cancelled'|'Membership Created'|'Membership Updated'|'Register Delegated Administrator'>,
 *         ...,
 *     }>,
 *     optInFeatures?: list<array{featureName?: 'Triage', isEnabled?: bool, ...}>,
 *     tags?: array<string, string>,
 *     coverEntireOrganization?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembershipAsync(array{
 *     clientToken?: string,
 *     membershipName?: string,
 *     incidentResponseTeam?: list<array{
 *         name?: string,
 *         jobTitle?: string,
 *         email?: string,
 *         communicationPreferences?: list<'Case Acknowledged'|'Case Attachment Url Uploaded'|'Case Closed'|'Case Comment Added'|'Case Comment Updated'|'Case Created'|'Case Pending Customer Action Reminder'|'Case Status Updated'|'Case Updated'|'Case Updated To Service Managed'|'Deregister Delegated Administrator'|'Disable AWS Service Access'|'Membership Cancelled'|'Membership Created'|'Membership Updated'|'Register Delegated Administrator'>,
 *         ...,
 *     }>,
 *     optInFeatures?: list<array{featureName?: 'Triage', isEnabled?: bool, ...}>,
 *     tags?: array<string, string>,
 *     coverEntireOrganization?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCase(array $args = [])
 * @phpstan-method \Aws\Result getCase(array{caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseAsync(array{caseId?: string, ...} $args = [])
 * @method \Aws\Result getCaseAttachmentDownloadUrl(array $args = [])
 * @phpstan-method \Aws\Result getCaseAttachmentDownloadUrl(array{caseId?: string, attachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseAttachmentDownloadUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseAttachmentDownloadUrlAsync(array{caseId?: string, attachmentId?: string, ...} $args = [])
 * @method \Aws\Result getCaseAttachmentUploadUrl(array $args = [])
 * @phpstan-method \Aws\Result getCaseAttachmentUploadUrl(array{caseId?: string, fileName?: string, contentLength?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseAttachmentUploadUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseAttachmentUploadUrlAsync(array{caseId?: string, fileName?: string, contentLength?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getMembership(array $args = [])
 * @phpstan-method \Aws\Result getMembership(array{membershipId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMembershipAsync(array{membershipId?: string, ...} $args = [])
 * @method \Aws\Result listCaseEdits(array $args = [])
 * @phpstan-method \Aws\Result listCaseEdits(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCaseEditsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCaseEditsAsync(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \Aws\Result listCases(array $args = [])
 * @phpstan-method \Aws\Result listCases(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCasesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listComments(array $args = [])
 * @phpstan-method \Aws\Result listComments(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommentsAsync(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \Aws\Result listInvestigations(array $args = [])
 * @phpstan-method \Aws\Result listInvestigations(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array{nextToken?: string, maxResults?: int, caseId?: string, ...} $args = [])
 * @method \Aws\Result listMemberships(array $args = [])
 * @phpstan-method \Aws\Result listMemberships(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembershipsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result sendFeedback(array $args = [])
 * @phpstan-method \Aws\Result sendFeedback(array{caseId?: string, resultId?: string, usefulness?: 'NOT_USEFUL'|'USEFUL', comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendFeedbackAsync(array{caseId?: string, resultId?: string, usefulness?: 'NOT_USEFUL'|'USEFUL', comment?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCase(array $args = [])
 * @phpstan-method \Aws\Result updateCase(array{
 *     caseId?: string,
 *     title?: string,
 *     description?: string,
 *     reportedIncidentStartDate?: int|string|\DateTimeInterface,
 *     actualIncidentStartDate?: int|string|\DateTimeInterface,
 *     engagementType?: 'Investigation'|'Security Incident',
 *     watchersToAdd?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     watchersToDelete?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     threatActorIpAddressesToAdd?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     threatActorIpAddressesToDelete?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     impactedServicesToAdd?: list<string>,
 *     impactedServicesToDelete?: list<string>,
 *     impactedAwsRegionsToAdd?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     impactedAwsRegionsToDelete?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     impactedAccountsToAdd?: list<string>,
 *     impactedAccountsToDelete?: list<string>,
 *     caseMetadata?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCaseAsync(array{
 *     caseId?: string,
 *     title?: string,
 *     description?: string,
 *     reportedIncidentStartDate?: int|string|\DateTimeInterface,
 *     actualIncidentStartDate?: int|string|\DateTimeInterface,
 *     engagementType?: 'Investigation'|'Security Incident',
 *     watchersToAdd?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     watchersToDelete?: list<array{email?: string, name?: string, jobTitle?: string, ...}>,
 *     threatActorIpAddressesToAdd?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     threatActorIpAddressesToDelete?: list<array{ipAddress?: string, userAgent?: string, ...}>,
 *     impactedServicesToAdd?: list<string>,
 *     impactedServicesToDelete?: list<string>,
 *     impactedAwsRegionsToAdd?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     impactedAwsRegionsToDelete?: list<array{
 *         region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         ...,
 *     }>,
 *     impactedAccountsToAdd?: list<string>,
 *     impactedAccountsToDelete?: list<string>,
 *     caseMetadata?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCaseComment(array $args = [])
 * @phpstan-method \Aws\Result updateCaseComment(array{caseId?: string, commentId?: string, body?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCaseCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCaseCommentAsync(array{caseId?: string, commentId?: string, body?: string, ...} $args = [])
 * @method \Aws\Result updateCaseStatus(array $args = [])
 * @phpstan-method \Aws\Result updateCaseStatus(array{
 *     caseId?: string,
 *     caseStatus?: 'Containment, Eradication and Recovery'|'Detection and Analysis'|'Post-incident Activities'|'Submitted',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCaseStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCaseStatusAsync(array{
 *     caseId?: string,
 *     caseStatus?: 'Containment, Eradication and Recovery'|'Detection and Analysis'|'Post-incident Activities'|'Submitted',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMembership(array $args = [])
 * @phpstan-method \Aws\Result updateMembership(array{
 *     membershipId?: string,
 *     membershipName?: string,
 *     incidentResponseTeam?: list<array{
 *         name?: string,
 *         jobTitle?: string,
 *         email?: string,
 *         communicationPreferences?: list<'Case Acknowledged'|'Case Attachment Url Uploaded'|'Case Closed'|'Case Comment Added'|'Case Comment Updated'|'Case Created'|'Case Pending Customer Action Reminder'|'Case Status Updated'|'Case Updated'|'Case Updated To Service Managed'|'Deregister Delegated Administrator'|'Disable AWS Service Access'|'Membership Cancelled'|'Membership Created'|'Membership Updated'|'Register Delegated Administrator'>,
 *         ...,
 *     }>,
 *     optInFeatures?: list<array{featureName?: 'Triage', isEnabled?: bool, ...}>,
 *     membershipAccountsConfigurationsUpdate?: array{
 *         coverEntireOrganization?: bool,
 *         organizationalUnitsToAdd?: list<string>,
 *         organizationalUnitsToRemove?: list<string>,
 *         ...,
 *     },
 *     undoMembershipCancellation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMembershipAsync(array{
 *     membershipId?: string,
 *     membershipName?: string,
 *     incidentResponseTeam?: list<array{
 *         name?: string,
 *         jobTitle?: string,
 *         email?: string,
 *         communicationPreferences?: list<'Case Acknowledged'|'Case Attachment Url Uploaded'|'Case Closed'|'Case Comment Added'|'Case Comment Updated'|'Case Created'|'Case Pending Customer Action Reminder'|'Case Status Updated'|'Case Updated'|'Case Updated To Service Managed'|'Deregister Delegated Administrator'|'Disable AWS Service Access'|'Membership Cancelled'|'Membership Created'|'Membership Updated'|'Register Delegated Administrator'>,
 *         ...,
 *     }>,
 *     optInFeatures?: list<array{featureName?: 'Triage', isEnabled?: bool, ...}>,
 *     membershipAccountsConfigurationsUpdate?: array{
 *         coverEntireOrganization?: bool,
 *         organizationalUnitsToAdd?: list<string>,
 *         organizationalUnitsToRemove?: list<string>,
 *         ...,
 *     },
 *     undoMembershipCancellation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResolverType(array $args = [])
 * @phpstan-method \Aws\Result updateResolverType(array{caseId?: string, resolverType?: 'AWS'|'Self', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverTypeAsync(array{caseId?: string, resolverType?: 'AWS'|'Self', ...} $args = [])
 */
class SecurityIRClient extends AwsClient {}
