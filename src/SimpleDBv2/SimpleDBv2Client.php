<?php
namespace Aws\SimpleDBv2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SimpleDB v2** service.
 * @method \Aws\Result getExport(array $args = [])
 * @phpstan-method \Aws\Result getExport(array{exportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportAsync(array{exportArn?: string, ...} $args = [])
 * @method \Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{domainName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{domainName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result startDomainExport(array $args = [])
 * @phpstan-method \Aws\Result startDomainExport(array{
 *     clientToken?: string,
 *     domainName?: string,
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     s3SseAlgorithm?: 'AES256'|'KMS',
 *     s3SseKmsKeyId?: string,
 *     s3BucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDomainExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDomainExportAsync(array{
 *     clientToken?: string,
 *     domainName?: string,
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     s3SseAlgorithm?: 'AES256'|'KMS',
 *     s3SseKmsKeyId?: string,
 *     s3BucketOwner?: string,
 *     ...,
 * } $args = [])
 */
class SimpleDBv2Client extends AwsClient {}
