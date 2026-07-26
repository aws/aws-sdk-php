<?php
namespace Aws\ApplicationCostProfiler;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Application Cost Profiler** service.
 * @method \Aws\Result deleteReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteReportDefinition(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result getReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result getReportDefinition(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReportDefinitionAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result importApplicationUsage(array $args = [])
 * @phpstan-method \Aws\Result importApplicationUsage(array{
 *     sourceS3Location?: array{bucket?: string, key?: string, region?: 'af-south-1'|'ap-east-1'|'eu-south-1'|'me-south-1', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importApplicationUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importApplicationUsageAsync(array{
 *     sourceS3Location?: array{bucket?: string, key?: string, region?: 'af-south-1'|'ap-east-1'|'eu-south-1'|'me-south-1', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReportDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listReportDefinitions(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportDefinitionsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result putReportDefinition(array{
 *     reportId?: string,
 *     reportDescription?: string,
 *     reportFrequency?: 'ALL'|'DAILY'|'MONTHLY',
 *     format?: 'CSV'|'PARQUET',
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putReportDefinitionAsync(array{
 *     reportId?: string,
 *     reportDescription?: string,
 *     reportFrequency?: 'ALL'|'DAILY'|'MONTHLY',
 *     format?: 'CSV'|'PARQUET',
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateReportDefinition(array{
 *     reportId?: string,
 *     reportDescription?: string,
 *     reportFrequency?: 'ALL'|'DAILY'|'MONTHLY',
 *     format?: 'CSV'|'PARQUET',
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReportDefinitionAsync(array{
 *     reportId?: string,
 *     reportDescription?: string,
 *     reportFrequency?: 'ALL'|'DAILY'|'MONTHLY',
 *     format?: 'CSV'|'PARQUET',
 *     destinationS3Location?: array{bucket?: string, prefix?: string, ...},
 *     ...,
 * } $args = [])
 */
class ApplicationCostProfilerClient extends AwsClient {}
