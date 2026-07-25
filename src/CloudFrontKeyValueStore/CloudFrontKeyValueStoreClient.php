<?php
namespace Aws\CloudFrontKeyValueStore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront KeyValueStore** service.
 * @method \Aws\Result deleteKey(array $args = [])
 * @phpstan-method \Aws\Result deleteKey(array{KvsARN?: string, Key?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyAsync(array{KvsARN?: string, Key?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result describeKeyValueStore(array $args = [])
 * @phpstan-method \Aws\Result describeKeyValueStore(array{KvsARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array{KvsARN?: string, ...} $args = [])
 * @method \Aws\Result getKey(array $args = [])
 * @phpstan-method \Aws\Result getKey(array{KvsARN?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyAsync(array{KvsARN?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @phpstan-method \Aws\Result listKeys(array{KvsARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeysAsync(array{KvsARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putKey(array $args = [])
 * @phpstan-method \Aws\Result putKey(array{Key?: string, Value?: string, KvsARN?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putKeyAsync(array{Key?: string, Value?: string, KvsARN?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result updateKeys(array $args = [])
 * @phpstan-method \Aws\Result updateKeys(array{
 *     KvsARN?: string,
 *     IfMatch?: string,
 *     Puts?: list<array{Key?: string, Value?: string, ...}>,
 *     Deletes?: list<array{Key?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeysAsync(array{
 *     KvsARN?: string,
 *     IfMatch?: string,
 *     Puts?: list<array{Key?: string, Value?: string, ...}>,
 *     Deletes?: list<array{Key?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class CloudFrontKeyValueStoreClient extends AwsClient {}
