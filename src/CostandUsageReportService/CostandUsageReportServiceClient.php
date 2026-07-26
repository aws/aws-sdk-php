<?php
namespace Aws\CostandUsageReportService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cost and Usage Report Service** service.
 * @method \Aws\Result deleteReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteReportDefinition(array{ReportName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array{ReportName?: string, ...} $args = [])
 * @method \Aws\Result describeReportDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeReportDefinitions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReportDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReportDefinitionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ReportName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ReportName?: string, ...} $args = [])
 * @method \Aws\Result modifyReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result modifyReportDefinition(array{
 *     ReportName?: string,
 *     ReportDefinition?: array{
 *         ReportName?: string,
 *         TimeUnit?: 'DAILY'|'HOURLY'|'MONTHLY',
 *         Format?: 'Parquet'|'textORcsv',
 *         Compression?: 'GZIP'|'Parquet'|'ZIP',
 *         AdditionalSchemaElements?: list<'MANUAL_DISCOUNT_COMPATIBILITY'|'RESOURCES'|'SPLIT_COST_ALLOCATION_DATA'>,
 *         S3Bucket?: string,
 *         S3Prefix?: string,
 *         S3Region?: 'af-south-1'|'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ca-central-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'me-central-1'|'me-south-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         AdditionalArtifacts?: list<'ATHENA'|'QUICKSIGHT'|'REDSHIFT'>,
 *         RefreshClosedReports?: bool,
 *         ReportVersioning?: 'CREATE_NEW_REPORT'|'OVERWRITE_REPORT',
 *         BillingViewArn?: string,
 *         ReportStatus?: array{lastDelivery?: string, lastStatus?: 'ERROR_NO_BUCKET'|'ERROR_PERMISSIONS'|'SUCCESS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReportDefinitionAsync(array{
 *     ReportName?: string,
 *     ReportDefinition?: array{
 *         ReportName?: string,
 *         TimeUnit?: 'DAILY'|'HOURLY'|'MONTHLY',
 *         Format?: 'Parquet'|'textORcsv',
 *         Compression?: 'GZIP'|'Parquet'|'ZIP',
 *         AdditionalSchemaElements?: list<'MANUAL_DISCOUNT_COMPATIBILITY'|'RESOURCES'|'SPLIT_COST_ALLOCATION_DATA'>,
 *         S3Bucket?: string,
 *         S3Prefix?: string,
 *         S3Region?: 'af-south-1'|'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ca-central-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'me-central-1'|'me-south-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         AdditionalArtifacts?: list<'ATHENA'|'QUICKSIGHT'|'REDSHIFT'>,
 *         RefreshClosedReports?: bool,
 *         ReportVersioning?: 'CREATE_NEW_REPORT'|'OVERWRITE_REPORT',
 *         BillingViewArn?: string,
 *         ReportStatus?: array{lastDelivery?: string, lastStatus?: 'ERROR_NO_BUCKET'|'ERROR_PERMISSIONS'|'SUCCESS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putReportDefinition(array $args = [])
 * @phpstan-method \Aws\Result putReportDefinition(array{
 *     ReportDefinition?: array{
 *         ReportName?: string,
 *         TimeUnit?: 'DAILY'|'HOURLY'|'MONTHLY',
 *         Format?: 'Parquet'|'textORcsv',
 *         Compression?: 'GZIP'|'Parquet'|'ZIP',
 *         AdditionalSchemaElements?: list<'MANUAL_DISCOUNT_COMPATIBILITY'|'RESOURCES'|'SPLIT_COST_ALLOCATION_DATA'>,
 *         S3Bucket?: string,
 *         S3Prefix?: string,
 *         S3Region?: 'af-south-1'|'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ca-central-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'me-central-1'|'me-south-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         AdditionalArtifacts?: list<'ATHENA'|'QUICKSIGHT'|'REDSHIFT'>,
 *         RefreshClosedReports?: bool,
 *         ReportVersioning?: 'CREATE_NEW_REPORT'|'OVERWRITE_REPORT',
 *         BillingViewArn?: string,
 *         ReportStatus?: array{lastDelivery?: string, lastStatus?: 'ERROR_NO_BUCKET'|'ERROR_PERMISSIONS'|'SUCCESS', ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putReportDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putReportDefinitionAsync(array{
 *     ReportDefinition?: array{
 *         ReportName?: string,
 *         TimeUnit?: 'DAILY'|'HOURLY'|'MONTHLY',
 *         Format?: 'Parquet'|'textORcsv',
 *         Compression?: 'GZIP'|'Parquet'|'ZIP',
 *         AdditionalSchemaElements?: list<'MANUAL_DISCOUNT_COMPATIBILITY'|'RESOURCES'|'SPLIT_COST_ALLOCATION_DATA'>,
 *         S3Bucket?: string,
 *         S3Prefix?: string,
 *         S3Region?: 'af-south-1'|'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ca-central-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'me-central-1'|'me-south-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         AdditionalArtifacts?: list<'ATHENA'|'QUICKSIGHT'|'REDSHIFT'>,
 *         RefreshClosedReports?: bool,
 *         ReportVersioning?: 'CREATE_NEW_REPORT'|'OVERWRITE_REPORT',
 *         BillingViewArn?: string,
 *         ReportStatus?: array{lastDelivery?: string, lastStatus?: 'ERROR_NO_BUCKET'|'ERROR_PERMISSIONS'|'SUCCESS', ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ReportName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ReportName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ReportName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ReportName?: string, TagKeys?: list<string>, ...} $args = [])
 */
class CostandUsageReportServiceClient extends AwsClient {}
