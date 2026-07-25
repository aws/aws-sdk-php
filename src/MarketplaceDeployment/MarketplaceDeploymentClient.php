<?php
namespace Aws\MarketplaceDeployment;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Deployment Service** service.
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putDeploymentParameter(array $args = [])
 * @phpstan-method \Aws\Result putDeploymentParameter(array{
 *     agreementId?: string,
 *     catalog?: string,
 *     clientToken?: string,
 *     deploymentParameter?: array{name?: string, secretString?: string, ...},
 *     expirationDate?: int|string|\DateTimeInterface,
 *     productId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeploymentParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeploymentParameterAsync(array{
 *     agreementId?: string,
 *     catalog?: string,
 *     clientToken?: string,
 *     deploymentParameter?: array{name?: string, secretString?: string, ...},
 *     expirationDate?: int|string|\DateTimeInterface,
 *     productId?: string,
 *     tags?: array<string, string>,
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
