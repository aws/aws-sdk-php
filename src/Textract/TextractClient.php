<?php
namespace Aws\Textract;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Textract** service.
 * @method \Aws\Result analyzeDocument(array $args = [])
 * @phpstan-method \Aws\Result analyzeDocument(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     HumanLoopConfig?: array{
 *         HumanLoopName?: string,
 *         FlowDefinitionArn?: string,
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     QueriesConfig?: array{Queries?: list<array>, ...},
 *     AdaptersConfig?: array{Adapters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise analyzeDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise analyzeDocumentAsync(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     HumanLoopConfig?: array{
 *         HumanLoopName?: string,
 *         FlowDefinitionArn?: string,
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     QueriesConfig?: array{Queries?: list<array>, ...},
 *     AdaptersConfig?: array{Adapters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result analyzeExpense(array $args = [])
 * @phpstan-method \Aws\Result analyzeExpense(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise analyzeExpenseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise analyzeExpenseAsync(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result analyzeID(array $args = [])
 * @phpstan-method \Aws\Result analyzeID(array{
 *     DocumentPages?: list<array{Bytes?: string|resource|\Psr\Http\Message\StreamInterface, S3Object?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise analyzeIDAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise analyzeIDAsync(array{
 *     DocumentPages?: list<array{Bytes?: string|resource|\Psr\Http\Message\StreamInterface, S3Object?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAdapter(array $args = [])
 * @phpstan-method \Aws\Result createAdapter(array{
 *     AdapterName?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     AutoUpdate?: 'DISABLED'|'ENABLED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAdapterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAdapterAsync(array{
 *     AdapterName?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     AutoUpdate?: 'DISABLED'|'ENABLED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAdapterVersion(array $args = [])
 * @phpstan-method \Aws\Result createAdapterVersion(array{
 *     AdapterId?: string,
 *     ClientRequestToken?: string,
 *     DatasetConfig?: array{ManifestS3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     KMSKeyId?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAdapterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAdapterVersionAsync(array{
 *     AdapterId?: string,
 *     ClientRequestToken?: string,
 *     DatasetConfig?: array{ManifestS3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     KMSKeyId?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAdapter(array $args = [])
 * @phpstan-method \Aws\Result deleteAdapter(array{AdapterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAdapterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAdapterAsync(array{AdapterId?: string, ...} $args = [])
 * @method \Aws\Result deleteAdapterVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteAdapterVersion(array{AdapterId?: string, AdapterVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAdapterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAdapterVersionAsync(array{AdapterId?: string, AdapterVersion?: string, ...} $args = [])
 * @method \Aws\Result detectDocumentText(array $args = [])
 * @phpstan-method \Aws\Result detectDocumentText(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectDocumentTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectDocumentTextAsync(array{
 *     Document?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAdapter(array $args = [])
 * @phpstan-method \Aws\Result getAdapter(array{AdapterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdapterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdapterAsync(array{AdapterId?: string, ...} $args = [])
 * @method \Aws\Result getAdapterVersion(array $args = [])
 * @phpstan-method \Aws\Result getAdapterVersion(array{AdapterId?: string, AdapterVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdapterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdapterVersionAsync(array{AdapterId?: string, AdapterVersion?: string, ...} $args = [])
 * @method \Aws\Result getDocumentAnalysis(array $args = [])
 * @phpstan-method \Aws\Result getDocumentAnalysis(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentAnalysisAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getDocumentTextDetection(array $args = [])
 * @phpstan-method \Aws\Result getDocumentTextDetection(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentTextDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentTextDetectionAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getExpenseAnalysis(array $args = [])
 * @phpstan-method \Aws\Result getExpenseAnalysis(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExpenseAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExpenseAnalysisAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getLendingAnalysis(array $args = [])
 * @phpstan-method \Aws\Result getLendingAnalysis(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLendingAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLendingAnalysisAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getLendingAnalysisSummary(array $args = [])
 * @phpstan-method \Aws\Result getLendingAnalysisSummary(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLendingAnalysisSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLendingAnalysisSummaryAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result listAdapterVersions(array $args = [])
 * @phpstan-method \Aws\Result listAdapterVersions(array{
 *     AdapterId?: string,
 *     AfterCreationTime?: int|string|\DateTimeInterface,
 *     BeforeCreationTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdapterVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdapterVersionsAsync(array{
 *     AdapterId?: string,
 *     AfterCreationTime?: int|string|\DateTimeInterface,
 *     BeforeCreationTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAdapters(array $args = [])
 * @phpstan-method \Aws\Result listAdapters(array{
 *     AfterCreationTime?: int|string|\DateTimeInterface,
 *     BeforeCreationTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdaptersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdaptersAsync(array{
 *     AfterCreationTime?: int|string|\DateTimeInterface,
 *     BeforeCreationTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result startDocumentAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startDocumentAnalysis(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     QueriesConfig?: array{Queries?: list<array>, ...},
 *     AdaptersConfig?: array{Adapters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDocumentAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDocumentAnalysisAsync(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     FeatureTypes?: list<'FORMS'|'LAYOUT'|'QUERIES'|'SIGNATURES'|'TABLES'>,
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     QueriesConfig?: array{Queries?: list<array>, ...},
 *     AdaptersConfig?: array{Adapters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDocumentTextDetection(array $args = [])
 * @phpstan-method \Aws\Result startDocumentTextDetection(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDocumentTextDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDocumentTextDetectionAsync(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExpenseAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startExpenseAnalysis(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExpenseAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExpenseAnalysisAsync(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startLendingAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startLendingAnalysis(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startLendingAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLendingAnalysisAsync(array{
 *     DocumentLocation?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     JobTag?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3Prefix?: string, ...},
 *     KMSKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAdapter(array $args = [])
 * @phpstan-method \Aws\Result updateAdapter(array{AdapterId?: string, Description?: string, AdapterName?: string, AutoUpdate?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAdapterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAdapterAsync(array{AdapterId?: string, Description?: string, AdapterName?: string, AutoUpdate?: 'DISABLED'|'ENABLED', ...} $args = [])
 */
class TextractClient extends AwsClient {}
