<?php
namespace Aws\Artifact;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Artifact** service.
 * @method \Aws\Result createComplianceInquiry(array $args = [])
 * @phpstan-method \Aws\Result createComplianceInquiry(array{
 *     name?: string,
 *     inquiryContent?: array{
 *         query?: string,
 *         fileContent?: array{fileSections?: list<string>, content?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     supportMode?: 'AI_ONLY'|'FULL_SUPPORT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComplianceInquiryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComplianceInquiryAsync(array{
 *     name?: string,
 *     inquiryContent?: array{
 *         query?: string,
 *         fileContent?: array{fileSections?: list<string>, content?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     supportMode?: 'AI_ONLY'|'FULL_SUPPORT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportComplianceInquiry(array $args = [])
 * @phpstan-method \Aws\Result exportComplianceInquiry(array{complianceInquiryId?: string, queryIdentifiers?: list<int>, includeCitations?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportComplianceInquiryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportComplianceInquiryAsync(array{complianceInquiryId?: string, queryIdentifiers?: list<int>, includeCitations?: bool, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getComplianceInquiryMetadata(array $args = [])
 * @phpstan-method \Aws\Result getComplianceInquiryMetadata(array{complianceInquiryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComplianceInquiryMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComplianceInquiryMetadataAsync(array{complianceInquiryId?: string, ...} $args = [])
 * @method \Aws\Result getReport(array $args = [])
 * @phpstan-method \Aws\Result getReport(array{reportId?: string, reportVersion?: int, termToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReportAsync(array{reportId?: string, reportVersion?: int, termToken?: string, ...} $args = [])
 * @method \Aws\Result getReportMetadata(array $args = [])
 * @phpstan-method \Aws\Result getReportMetadata(array{reportId?: string, reportVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReportMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReportMetadataAsync(array{reportId?: string, reportVersion?: int, ...} $args = [])
 * @method \Aws\Result getTermForReport(array $args = [])
 * @phpstan-method \Aws\Result getTermForReport(array{reportId?: string, reportVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTermForReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTermForReportAsync(array{reportId?: string, reportVersion?: int, ...} $args = [])
 * @method \Aws\Result listComplianceInquiries(array $args = [])
 * @phpstan-method \Aws\Result listComplianceInquiries(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComplianceInquiriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComplianceInquiriesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComplianceInquiryQueries(array $args = [])
 * @phpstan-method \Aws\Result listComplianceInquiryQueries(array{complianceInquiryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComplianceInquiryQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComplianceInquiryQueriesAsync(array{complianceInquiryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomerAgreements(array $args = [])
 * @phpstan-method \Aws\Result listCustomerAgreements(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomerAgreementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomerAgreementsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReportVersions(array $args = [])
 * @phpstan-method \Aws\Result listReportVersions(array{reportId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportVersionsAsync(array{reportId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReports(array $args = [])
 * @phpstan-method \Aws\Result listReports(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result putAccountSettings(array{notificationSubscriptionStatus?: 'NOT_SUBSCRIBED'|'SUBSCRIBED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSettingsAsync(array{notificationSubscriptionStatus?: 'NOT_SUBSCRIBED'|'SUBSCRIBED', ...} $args = [])
 * @method \Aws\Result putComplianceInquiryFeedback(array $args = [])
 * @phpstan-method \Aws\Result putComplianceInquiryFeedback(array{
 *     complianceInquiryId?: string,
 *     queryIdentifier?: int,
 *     rating?: 'THUMBS_DOWN'|'THUMBS_UP',
 *     responseRevisionId?: int,
 *     reasonCodes?: list<'IRRELEVANT_RESPONSE'|'OTHER'|'PARTIAL_RESPONSE'>,
 *     comment?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putComplianceInquiryFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putComplianceInquiryFeedbackAsync(array{
 *     complianceInquiryId?: string,
 *     queryIdentifier?: int,
 *     rating?: 'THUMBS_DOWN'|'THUMBS_UP',
 *     responseRevisionId?: int,
 *     reasonCodes?: list<'IRRELEVANT_RESPONSE'|'OTHER'|'PARTIAL_RESPONSE'>,
 *     comment?: string,
 *     clientToken?: string,
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
 */
class ArtifactClient extends AwsClient {}
