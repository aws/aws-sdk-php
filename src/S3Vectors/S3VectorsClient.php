<?php
namespace Aws\S3Vectors;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 Vectors** service.
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{
 *     vectorBucketName?: string,
 *     vectorBucketArn?: string,
 *     indexName?: string,
 *     dataType?: 'float32',
 *     dimension?: int,
 *     distanceMetric?: 'cosine'|'euclidean',
 *     metadataConfiguration?: array{nonFilterableMetadataKeys?: list<string>, ...},
 *     encryptionConfiguration?: array{sseType?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{
 *     vectorBucketName?: string,
 *     vectorBucketArn?: string,
 *     indexName?: string,
 *     dataType?: 'float32',
 *     dimension?: int,
 *     distanceMetric?: 'cosine'|'euclidean',
 *     metadataConfiguration?: array{nonFilterableMetadataKeys?: list<string>, ...},
 *     encryptionConfiguration?: array{sseType?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVectorBucket(array $args = [])
 * @phpstan-method \Aws\Result createVectorBucket(array{
 *     vectorBucketName?: string,
 *     encryptionConfiguration?: array{sseType?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVectorBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVectorBucketAsync(array{
 *     vectorBucketName?: string,
 *     encryptionConfiguration?: array{sseType?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{vectorBucketName?: string, indexName?: string, indexArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{vectorBucketName?: string, indexName?: string, indexArn?: string, ...} $args = [])
 * @method \Aws\Result deleteVectorBucket(array $args = [])
 * @phpstan-method \Aws\Result deleteVectorBucket(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVectorBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVectorBucketAsync(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \Aws\Result deleteVectorBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteVectorBucketPolicy(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVectorBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVectorBucketPolicyAsync(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \Aws\Result deleteVectors(array $args = [])
 * @phpstan-method \Aws\Result deleteVectors(array{vectorBucketName?: string, indexName?: string, indexArn?: string, keys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVectorsAsync(array{vectorBucketName?: string, indexName?: string, indexArn?: string, keys?: list<string>, ...} $args = [])
 * @method \Aws\Result getIndex(array $args = [])
 * @phpstan-method \Aws\Result getIndex(array{vectorBucketName?: string, indexName?: string, indexArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexAsync(array{vectorBucketName?: string, indexName?: string, indexArn?: string, ...} $args = [])
 * @method \Aws\Result getVectorBucket(array $args = [])
 * @phpstan-method \Aws\Result getVectorBucket(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVectorBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVectorBucketAsync(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \Aws\Result getVectorBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result getVectorBucketPolicy(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVectorBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVectorBucketPolicyAsync(array{vectorBucketName?: string, vectorBucketArn?: string, ...} $args = [])
 * @method \Aws\Result getVectors(array $args = [])
 * @phpstan-method \Aws\Result getVectors(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     keys?: list<string>,
 *     returnData?: bool,
 *     returnMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getVectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVectorsAsync(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     keys?: list<string>,
 *     returnData?: bool,
 *     returnMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIndexes(array $args = [])
 * @phpstan-method \Aws\Result listIndexes(array{
 *     vectorBucketName?: string,
 *     vectorBucketArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     prefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndexesAsync(array{
 *     vectorBucketName?: string,
 *     vectorBucketArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     prefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVectorBuckets(array $args = [])
 * @phpstan-method \Aws\Result listVectorBuckets(array{maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVectorBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVectorBucketsAsync(array{maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \Aws\Result listVectors(array $args = [])
 * @phpstan-method \Aws\Result listVectors(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     segmentCount?: int,
 *     segmentIndex?: int,
 *     returnData?: bool,
 *     returnMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVectorsAsync(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     segmentCount?: int,
 *     segmentIndex?: int,
 *     returnData?: bool,
 *     returnMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVectorBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result putVectorBucketPolicy(array{vectorBucketName?: string, vectorBucketArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putVectorBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVectorBucketPolicyAsync(array{vectorBucketName?: string, vectorBucketArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putVectors(array $args = [])
 * @phpstan-method \Aws\Result putVectors(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     vectors?: list<array{key?: string, data?: array, metadata?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVectorsAsync(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     vectors?: list<array{key?: string, data?: array, metadata?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result queryVectors(array $args = [])
 * @phpstan-method \Aws\Result queryVectors(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     topK?: int,
 *     queryVector?: array{float32?: list<float>, ...},
 *     filter?: array,
 *     returnMetadata?: bool,
 *     returnDistance?: bool,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryVectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryVectorsAsync(array{
 *     vectorBucketName?: string,
 *     indexName?: string,
 *     indexArn?: string,
 *     topK?: int,
 *     queryVector?: array{float32?: list<float>, ...},
 *     filter?: array,
 *     returnMetadata?: bool,
 *     returnDistance?: bool,
 *     nextToken?: string,
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
class S3VectorsClient extends AwsClient {}
