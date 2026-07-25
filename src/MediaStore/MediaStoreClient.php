<?php
namespace Aws\MediaStore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaStore** service.
 * @method \Aws\Result createContainer(array $args = [])
 * @phpstan-method \Aws\Result createContainer(array{ContainerName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerAsync(array{ContainerName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteContainer(array $args = [])
 * @phpstan-method \Aws\Result deleteContainer(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result deleteContainerPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result deleteCorsPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteCorsPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCorsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCorsPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result deleteLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecyclePolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result deleteMetricPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteMetricPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMetricPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMetricPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result describeContainer(array $args = [])
 * @phpstan-method \Aws\Result describeContainer(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result getContainerPolicy(array $args = [])
 * @phpstan-method \Aws\Result getContainerPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result getCorsPolicy(array $args = [])
 * @phpstan-method \Aws\Result getCorsPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCorsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCorsPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result getLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result getMetricPolicy(array $args = [])
 * @phpstan-method \Aws\Result getMetricPolicy(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricPolicyAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result listContainers(array $args = [])
 * @phpstan-method \Aws\Result listContainers(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{Resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Resource?: string, ...} $args = [])
 * @method \Aws\Result putContainerPolicy(array $args = [])
 * @phpstan-method \Aws\Result putContainerPolicy(array{ContainerName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putContainerPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putContainerPolicyAsync(array{ContainerName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putCorsPolicy(array $args = [])
 * @phpstan-method \Aws\Result putCorsPolicy(array{
 *     ContainerName?: string,
 *     CorsPolicy?: list<array{
 *         AllowedOrigins?: list<string>,
 *         AllowedMethods?: list<'DELETE'|'GET'|'HEAD'|'PUT'>,
 *         AllowedHeaders?: list<string>,
 *         MaxAgeSeconds?: int,
 *         ExposeHeaders?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putCorsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCorsPolicyAsync(array{
 *     ContainerName?: string,
 *     CorsPolicy?: list<array{
 *         AllowedOrigins?: list<string>,
 *         AllowedMethods?: list<'DELETE'|'GET'|'HEAD'|'PUT'>,
 *         AllowedHeaders?: list<string>,
 *         MaxAgeSeconds?: int,
 *         ExposeHeaders?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result putLifecyclePolicy(array{ContainerName?: string, LifecyclePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLifecyclePolicyAsync(array{ContainerName?: string, LifecyclePolicy?: string, ...} $args = [])
 * @method \Aws\Result putMetricPolicy(array $args = [])
 * @phpstan-method \Aws\Result putMetricPolicy(array{
 *     ContainerName?: string,
 *     MetricPolicy?: array{ContainerLevelMetrics?: 'DISABLED'|'ENABLED', MetricPolicyRules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetricPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetricPolicyAsync(array{
 *     ContainerName?: string,
 *     MetricPolicy?: array{ContainerLevelMetrics?: 'DISABLED'|'ENABLED', MetricPolicyRules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAccessLogging(array $args = [])
 * @phpstan-method \Aws\Result startAccessLogging(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAccessLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAccessLoggingAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result stopAccessLogging(array $args = [])
 * @phpstan-method \Aws\Result stopAccessLogging(array{ContainerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAccessLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAccessLoggingAsync(array{ContainerName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Resource?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Resource?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 */
class MediaStoreClient extends AwsClient {}
