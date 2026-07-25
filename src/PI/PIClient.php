<?php
namespace Aws\PI;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Performance Insights** service.
 * @method \Aws\Result createPerformanceAnalysisReport(array $args = [])
 * @phpstan-method \Aws\Result createPerformanceAnalysisReport(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPerformanceAnalysisReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPerformanceAnalysisReportAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePerformanceAnalysisReport(array $args = [])
 * @phpstan-method \Aws\Result deletePerformanceAnalysisReport(array{ServiceType?: 'DOCDB'|'RDS', Identifier?: string, AnalysisReportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePerformanceAnalysisReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePerformanceAnalysisReportAsync(array{ServiceType?: 'DOCDB'|'RDS', Identifier?: string, AnalysisReportId?: string, ...} $args = [])
 * @method \Aws\Result describeDimensionKeys(array $args = [])
 * @phpstan-method \Aws\Result describeDimensionKeys(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Metric?: string,
 *     PeriodInSeconds?: int,
 *     GroupBy?: array{Group?: string, Dimensions?: list<string>, Limit?: int, ...},
 *     AdditionalMetrics?: list<string>,
 *     PartitionBy?: array{Group?: string, Dimensions?: list<string>, Limit?: int, ...},
 *     Filter?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDimensionKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDimensionKeysAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Metric?: string,
 *     PeriodInSeconds?: int,
 *     GroupBy?: array{Group?: string, Dimensions?: list<string>, Limit?: int, ...},
 *     AdditionalMetrics?: list<string>,
 *     PartitionBy?: array{Group?: string, Dimensions?: list<string>, Limit?: int, ...},
 *     Filter?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDimensionKeyDetails(array $args = [])
 * @phpstan-method \Aws\Result getDimensionKeyDetails(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     Group?: string,
 *     GroupIdentifier?: string,
 *     RequestedDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDimensionKeyDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDimensionKeyDetailsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     Group?: string,
 *     GroupIdentifier?: string,
 *     RequestedDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPerformanceAnalysisReport(array $args = [])
 * @phpstan-method \Aws\Result getPerformanceAnalysisReport(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     AnalysisReportId?: string,
 *     TextFormat?: 'MARKDOWN'|'PLAIN_TEXT',
 *     AcceptLanguage?: 'EN_US',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPerformanceAnalysisReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPerformanceAnalysisReportAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     AnalysisReportId?: string,
 *     TextFormat?: 'MARKDOWN'|'PLAIN_TEXT',
 *     AcceptLanguage?: 'EN_US',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceMetadata(array $args = [])
 * @phpstan-method \Aws\Result getResourceMetadata(array{ServiceType?: 'DOCDB'|'RDS', Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceMetadataAsync(array{ServiceType?: 'DOCDB'|'RDS', Identifier?: string, ...} $args = [])
 * @method \Aws\Result getResourceMetrics(array $args = [])
 * @phpstan-method \Aws\Result getResourceMetrics(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     MetricQueries?: list<array{Metric?: string, GroupBy?: array, Filter?: array<string, string>, ...}>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     PeriodInSeconds?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PeriodAlignment?: 'END_TIME'|'START_TIME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceMetricsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     MetricQueries?: list<array{Metric?: string, GroupBy?: array, Filter?: array<string, string>, ...}>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     PeriodInSeconds?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PeriodAlignment?: 'END_TIME'|'START_TIME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAvailableResourceDimensions(array $args = [])
 * @phpstan-method \Aws\Result listAvailableResourceDimensions(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     Metrics?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AuthorizedActions?: list<'DescribeDimensionKeys'|'GetDimensionKeyDetails'|'GetResourceMetrics'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableResourceDimensionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableResourceDimensionsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     Metrics?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AuthorizedActions?: list<'DescribeDimensionKeys'|'GetDimensionKeyDetails'|'GetResourceMetrics'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAvailableResourceMetrics(array $args = [])
 * @phpstan-method \Aws\Result listAvailableResourceMetrics(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     MetricTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableResourceMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableResourceMetricsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     MetricTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPerformanceAnalysisReportRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listPerformanceAnalysisReportRecommendations(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     AnalysisReportId?: string,
 *     RecommendationIds?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPerformanceAnalysisReportRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPerformanceAnalysisReportRecommendationsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     AnalysisReportId?: string,
 *     RecommendationIds?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPerformanceAnalysisReports(array $args = [])
 * @phpstan-method \Aws\Result listPerformanceAnalysisReports(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ListTags?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPerformanceAnalysisReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPerformanceAnalysisReportsAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     Identifier?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ListTags?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ServiceType?: 'DOCDB'|'RDS', ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ServiceType?: 'DOCDB'|'RDS', ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     ResourceARN?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{
 *     ServiceType?: 'DOCDB'|'RDS',
 *     ResourceARN?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ServiceType?: 'DOCDB'|'RDS', ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ServiceType?: 'DOCDB'|'RDS', ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 */
class PIClient extends AwsClient {}
