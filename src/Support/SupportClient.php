<?php
namespace Aws\Support;

use Aws\AwsClient;

/**
 * AWS Support client.
 *
 * @method \Aws\Result addAttachmentsToSet(array $args = [])
 * @phpstan-method \Aws\Result addAttachmentsToSet(array{
 *     attachmentSetId?: string,
 *     attachments?: list<array{fileName?: string, data?: string|resource|\Psr\Http\Message\StreamInterface, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addAttachmentsToSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addAttachmentsToSetAsync(array{
 *     attachmentSetId?: string,
 *     attachments?: list<array{fileName?: string, data?: string|resource|\Psr\Http\Message\StreamInterface, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addCommunicationToCase(array $args = [])
 * @phpstan-method \Aws\Result addCommunicationToCase(array{
 *     caseId?: string,
 *     communicationBody?: string,
 *     ccEmailAddresses?: list<string>,
 *     attachmentSetId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addCommunicationToCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addCommunicationToCaseAsync(array{
 *     caseId?: string,
 *     communicationBody?: string,
 *     ccEmailAddresses?: list<string>,
 *     attachmentSetId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCase(array $args = [])
 * @phpstan-method \Aws\Result createCase(array{
 *     subject?: string,
 *     serviceCode?: string,
 *     severityCode?: string,
 *     categoryCode?: string,
 *     communicationBody?: string,
 *     ccEmailAddresses?: list<string>,
 *     language?: string,
 *     issueType?: string,
 *     attachmentSetId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCaseAsync(array{
 *     subject?: string,
 *     serviceCode?: string,
 *     severityCode?: string,
 *     categoryCode?: string,
 *     communicationBody?: string,
 *     ccEmailAddresses?: list<string>,
 *     language?: string,
 *     issueType?: string,
 *     attachmentSetId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAttachment(array $args = [])
 * @phpstan-method \Aws\Result describeAttachment(array{attachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAttachmentAsync(array{attachmentId?: string, ...} $args = [])
 * @method \Aws\Result describeCases(array $args = [])
 * @phpstan-method \Aws\Result describeCases(array{
 *     caseIdList?: list<string>,
 *     displayId?: string,
 *     afterTime?: string,
 *     beforeTime?: string,
 *     includeResolvedCases?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     language?: string,
 *     includeCommunications?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCasesAsync(array{
 *     caseIdList?: list<string>,
 *     displayId?: string,
 *     afterTime?: string,
 *     beforeTime?: string,
 *     includeResolvedCases?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     language?: string,
 *     includeCommunications?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCommunications(array $args = [])
 * @phpstan-method \Aws\Result describeCommunications(array{caseId?: string, beforeTime?: string, afterTime?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCommunicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCommunicationsAsync(array{caseId?: string, beforeTime?: string, afterTime?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeCreateCaseOptions(array $args = [])
 * @phpstan-method \Aws\Result describeCreateCaseOptions(array{issueType?: string, serviceCode?: string, language?: string, categoryCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCreateCaseOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCreateCaseOptionsAsync(array{issueType?: string, serviceCode?: string, language?: string, categoryCode?: string, ...} $args = [])
 * @method \Aws\Result describeServices(array $args = [])
 * @phpstan-method \Aws\Result describeServices(array{serviceCodeList?: list<string>, language?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServicesAsync(array{serviceCodeList?: list<string>, language?: string, ...} $args = [])
 * @method \Aws\Result describeSeverityLevels(array $args = [])
 * @phpstan-method \Aws\Result describeSeverityLevels(array{language?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSeverityLevelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSeverityLevelsAsync(array{language?: string, ...} $args = [])
 * @method \Aws\Result describeSupportedLanguages(array $args = [])
 * @phpstan-method \Aws\Result describeSupportedLanguages(array{issueType?: string, serviceCode?: string, categoryCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSupportedLanguagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSupportedLanguagesAsync(array{issueType?: string, serviceCode?: string, categoryCode?: string, ...} $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckRefreshStatuses(array $args = [])
 * @phpstan-method \Aws\Result describeTrustedAdvisorCheckRefreshStatuses(array{checkIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckRefreshStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckRefreshStatusesAsync(array{checkIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckResult(array $args = [])
 * @phpstan-method \Aws\Result describeTrustedAdvisorCheckResult(array{checkId?: string, language?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckResultAsync(array{checkId?: string, language?: string, ...} $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckSummaries(array $args = [])
 * @phpstan-method \Aws\Result describeTrustedAdvisorCheckSummaries(array{checkIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckSummariesAsync(array{checkIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeTrustedAdvisorChecks(array $args = [])
 * @phpstan-method \Aws\Result describeTrustedAdvisorChecks(array{language?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustedAdvisorChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustedAdvisorChecksAsync(array{language?: string, ...} $args = [])
 * @method \Aws\Result refreshTrustedAdvisorCheck(array $args = [])
 * @phpstan-method \Aws\Result refreshTrustedAdvisorCheck(array{checkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise refreshTrustedAdvisorCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise refreshTrustedAdvisorCheckAsync(array{checkId?: string, ...} $args = [])
 * @method \Aws\Result resolveCase(array $args = [])
 * @phpstan-method \Aws\Result resolveCase(array{caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resolveCaseAsync(array{caseId?: string, ...} $args = [])
 */
class SupportClient extends AwsClient {}
