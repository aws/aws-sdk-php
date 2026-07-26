<?php
namespace Aws\BackupSearch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Backup Search** service.
 * @method \Aws\Result getSearchJob(array $args = [])
 * @phpstan-method \Aws\Result getSearchJob(array{SearchJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSearchJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSearchJobAsync(array{SearchJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getSearchResultExportJob(array $args = [])
 * @phpstan-method \Aws\Result getSearchResultExportJob(array{ExportJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSearchResultExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSearchResultExportJobAsync(array{ExportJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listSearchJobBackups(array $args = [])
 * @phpstan-method \Aws\Result listSearchJobBackups(array{SearchJobIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSearchJobBackupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSearchJobBackupsAsync(array{SearchJobIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSearchJobResults(array $args = [])
 * @phpstan-method \Aws\Result listSearchJobResults(array{SearchJobIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSearchJobResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSearchJobResultsAsync(array{SearchJobIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSearchJobs(array $args = [])
 * @phpstan-method \Aws\Result listSearchJobs(array{
 *     ByStatus?: 'COMPLETED'|'FAILED'|'RUNNING'|'STOPPED'|'STOPPING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSearchJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSearchJobsAsync(array{
 *     ByStatus?: 'COMPLETED'|'FAILED'|'RUNNING'|'STOPPED'|'STOPPING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSearchResultExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listSearchResultExportJobs(array{
 *     Status?: 'COMPLETED'|'FAILED'|'RUNNING',
 *     SearchJobIdentifier?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSearchResultExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSearchResultExportJobsAsync(array{
 *     Status?: 'COMPLETED'|'FAILED'|'RUNNING',
 *     SearchJobIdentifier?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startSearchJob(array $args = [])
 * @phpstan-method \Aws\Result startSearchJob(array{
 *     Tags?: array<string, string>,
 *     Name?: string,
 *     EncryptionKeyArn?: string,
 *     ClientToken?: string,
 *     SearchScope?: array{
 *         BackupResourceTypes?: list<'EBS'|'S3'>,
 *         BackupResourceCreationTime?: array{CreatedAfter?: int|string|\DateTimeInterface, CreatedBefore?: int|string|\DateTimeInterface, ...},
 *         SourceResourceArns?: list<string>,
 *         BackupResourceArns?: list<string>,
 *         BackupResourceTags?: array<string, string>,
 *         ...,
 *     },
 *     ItemFilters?: array{S3ItemFilters?: list<array>, EBSItemFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSearchJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSearchJobAsync(array{
 *     Tags?: array<string, string>,
 *     Name?: string,
 *     EncryptionKeyArn?: string,
 *     ClientToken?: string,
 *     SearchScope?: array{
 *         BackupResourceTypes?: list<'EBS'|'S3'>,
 *         BackupResourceCreationTime?: array{CreatedAfter?: int|string|\DateTimeInterface, CreatedBefore?: int|string|\DateTimeInterface, ...},
 *         SourceResourceArns?: list<string>,
 *         BackupResourceArns?: list<string>,
 *         BackupResourceTags?: array<string, string>,
 *         ...,
 *     },
 *     ItemFilters?: array{S3ItemFilters?: list<array>, EBSItemFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSearchResultExportJob(array $args = [])
 * @phpstan-method \Aws\Result startSearchResultExportJob(array{
 *     SearchJobIdentifier?: string,
 *     ExportSpecification?: array{s3ExportSpecification?: array{DestinationBucket?: string, DestinationPrefix?: string, ...}, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSearchResultExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSearchResultExportJobAsync(array{
 *     SearchJobIdentifier?: string,
 *     ExportSpecification?: array{s3ExportSpecification?: array{DestinationBucket?: string, DestinationPrefix?: string, ...}, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopSearchJob(array $args = [])
 * @phpstan-method \Aws\Result stopSearchJob(array{SearchJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSearchJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSearchJobAsync(array{SearchJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 */
class BackupSearchClient extends AwsClient {}
