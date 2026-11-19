<?php
namespace Aws\MarketplaceDeployment;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Deployment Service** service.
 * @method \Aws\Result getDeploymentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentConfiguration(array{catalog?: string, productId?: string, deliveryOptionType?: 'data-as-a-service', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentConfigurationAsync(array{catalog?: string, productId?: string, deliveryOptionType?: 'data-as-a-service', ...} $args = [])
 * @method \Aws\Result getDeploymentConfigurationJob(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentConfigurationJob(array{catalog?: string, productId?: string, deliveryOptionType?: 'data-as-a-service', jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentConfigurationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentConfigurationJobAsync(array{catalog?: string, productId?: string, deliveryOptionType?: 'data-as-a-service', jobId?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentConfigurationJobs(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentConfigurationJobs(array{
 *     catalog?: string,
 *     productId?: string,
 *     deliveryOptionType?: 'data-as-a-service',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentConfigurationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentConfigurationJobsAsync(array{
 *     catalog?: string,
 *     productId?: string,
 *     deliveryOptionType?: 'data-as-a-service',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putDeploymentParameter(array $args = [])
 * @phpstan-method \Aws\Result putDeploymentParameter(array{
 *     catalog?: string,
 *     productId?: string,
 *     agreementId?: string,
 *     deploymentParameter?: array{name?: string, secretString?: string, ...},
 *     tags?: array<string, string>,
 *     expirationDate?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeploymentParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeploymentParameterAsync(array{
 *     catalog?: string,
 *     productId?: string,
 *     agreementId?: string,
 *     deploymentParameter?: array{name?: string, secretString?: string, ...},
 *     tags?: array<string, string>,
 *     expirationDate?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDeploymentConfigurationJob(array $args = [])
 * @phpstan-method \Aws\Result startDeploymentConfigurationJob(array{
 *     catalog?: string,
 *     productId?: string,
 *     deliveryOptionType?: 'data-as-a-service',
 *     configuration?: array{dataAsAService?: array{fulfillmentUrl?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeploymentConfigurationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeploymentConfigurationJobAsync(array{
 *     catalog?: string,
 *     productId?: string,
 *     deliveryOptionType?: 'data-as-a-service',
 *     configuration?: array{dataAsAService?: array{fulfillmentUrl?: string, ...}, ...},
 *     tags?: array<string, string>,
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
class MarketplaceDeploymentClient extends AwsClient {}
