<?php
namespace Aws\LaunchWizard;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Launch Wizard** service.
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     workloadName?: string,
 *     deploymentPatternName?: string,
 *     name?: string,
 *     specifications?: array<string, string>,
 *     dryRun?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     workloadName?: string,
 *     deploymentPatternName?: string,
 *     name?: string,
 *     specifications?: array<string, string>,
 *     dryRun?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentPatternVersion(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentPatternVersion(array{workloadName?: string, deploymentPatternName?: string, deploymentPatternVersionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentPatternVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentPatternVersionAsync(array{workloadName?: string, deploymentPatternName?: string, deploymentPatternVersionName?: string, ...} $args = [])
 * @method \Aws\Result getWorkload(array $args = [])
 * @phpstan-method \Aws\Result getWorkload(array{workloadName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadAsync(array{workloadName?: string, ...} $args = [])
 * @method \Aws\Result getWorkloadDeploymentPattern(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadDeploymentPattern(array{workloadName?: string, deploymentPatternName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadDeploymentPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadDeploymentPatternAsync(array{workloadName?: string, deploymentPatternName?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentEvents(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentEvents(array{deploymentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentEventsAsync(array{deploymentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentPatternVersions(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentPatternVersions(array{
 *     workloadName?: string,
 *     deploymentPatternName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'updateFromVersion', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentPatternVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentPatternVersionsAsync(array{
 *     workloadName?: string,
 *     deploymentPatternName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'updateFromVersion', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{
 *     filters?: list<array{name?: 'DEPLOYMENT_STATUS'|'WORKLOAD_NAME', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{
 *     filters?: list<array{name?: 'DEPLOYMENT_STATUS'|'WORKLOAD_NAME', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkloadDeploymentPatterns(array $args = [])
 * @phpstan-method \Aws\Result listWorkloadDeploymentPatterns(array{workloadName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadDeploymentPatternsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadDeploymentPatternsAsync(array{workloadName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkloads(array $args = [])
 * @phpstan-method \Aws\Result listWorkloads(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDeployment(array $args = [])
 * @phpstan-method \Aws\Result updateDeployment(array{
 *     deploymentId?: string,
 *     specifications?: array<string, string>,
 *     workloadVersionName?: string,
 *     deploymentPatternVersionName?: string,
 *     dryRun?: bool,
 *     force?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array{
 *     deploymentId?: string,
 *     specifications?: array<string, string>,
 *     workloadVersionName?: string,
 *     deploymentPatternVersionName?: string,
 *     dryRun?: bool,
 *     force?: bool,
 *     ...,
 * } $args = [])
 */
class LaunchWizardClient extends AwsClient {}
