<?php
namespace Aws\LambdaWeb;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Lambda Web** service.
 * @method \Aws\Result createWebFunction(array $args = [])
 * @phpstan-method \Aws\Result createWebFunction(array{
 *     functionName?: string,
 *     revisionConfig?: array{
 *         description?: string,
 *         kmsKeyArn?: string,
 *         buildConfig?: array{codeConfig?: array, runtimeConfig?: array, ...},
 *         serviceConfig?: array{
 *             executionRoleArn?: string,
 *             timeoutSeconds?: int,
 *             maxConcurrencyPerEnvironment?: int,
 *             environmentVariables?: array<string, string>,
 *             telemetryConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     endpointConfig?: array{
 *         endpointName?: string,
 *         description?: string,
 *         endpointType?: 'HomeRegion'|'MultiRegion'|'PerRegion',
 *         authType?: 'ApplicationManaged'|'IamAuth',
 *         autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *         regions?: list<string>,
 *         scalingConfig?: array{maxEnvironments?: int, ...},
 *         throttleConfig?: array{rateLimit?: int, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebFunctionAsync(array{
 *     functionName?: string,
 *     revisionConfig?: array{
 *         description?: string,
 *         kmsKeyArn?: string,
 *         buildConfig?: array{codeConfig?: array, runtimeConfig?: array, ...},
 *         serviceConfig?: array{
 *             executionRoleArn?: string,
 *             timeoutSeconds?: int,
 *             maxConcurrencyPerEnvironment?: int,
 *             environmentVariables?: array<string, string>,
 *             telemetryConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     endpointConfig?: array{
 *         endpointName?: string,
 *         description?: string,
 *         endpointType?: 'HomeRegion'|'MultiRegion'|'PerRegion',
 *         authType?: 'ApplicationManaged'|'IamAuth',
 *         autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *         regions?: list<string>,
 *         scalingConfig?: array{maxEnvironments?: int, ...},
 *         throttleConfig?: array{rateLimit?: int, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebFunctionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createWebFunctionEndpoint(array{
 *     functionName?: string,
 *     endpointName?: string,
 *     description?: string,
 *     endpointType?: 'HomeRegion'|'MultiRegion'|'PerRegion',
 *     authType?: 'ApplicationManaged'|'IamAuth',
 *     autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *     revisionWeights?: list<array{revisionId?: string, weight?: int, ...}>,
 *     regions?: list<string>,
 *     scalingConfig?: array{maxEnvironments?: int, ...},
 *     throttleConfig?: array{rateLimit?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebFunctionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebFunctionEndpointAsync(array{
 *     functionName?: string,
 *     endpointName?: string,
 *     description?: string,
 *     endpointType?: 'HomeRegion'|'MultiRegion'|'PerRegion',
 *     authType?: 'ApplicationManaged'|'IamAuth',
 *     autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *     revisionWeights?: list<array{revisionId?: string, weight?: int, ...}>,
 *     regions?: list<string>,
 *     scalingConfig?: array{maxEnvironments?: int, ...},
 *     throttleConfig?: array{rateLimit?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebFunctionRevision(array $args = [])
 * @phpstan-method \Aws\Result createWebFunctionRevision(array{
 *     functionName?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     buildConfig?: array{codeConfig?: array{s3Object?: array, ...}, runtimeConfig?: array{runtime?: string, ...}, ...},
 *     serviceConfig?: array{
 *         executionRoleArn?: string,
 *         timeoutSeconds?: int,
 *         maxConcurrencyPerEnvironment?: int,
 *         environmentVariables?: array<string, string>,
 *         telemetryConfig?: array{loggingConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebFunctionRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebFunctionRevisionAsync(array{
 *     functionName?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     buildConfig?: array{codeConfig?: array{s3Object?: array, ...}, runtimeConfig?: array{runtime?: string, ...}, ...},
 *     serviceConfig?: array{
 *         executionRoleArn?: string,
 *         timeoutSeconds?: int,
 *         maxConcurrencyPerEnvironment?: int,
 *         environmentVariables?: array<string, string>,
 *         telemetryConfig?: array{loggingConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteWebFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteWebFunction(array{functionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebFunctionAsync(array{functionName?: string, ...} $args = [])
 * @method \Aws\Result deleteWebFunctionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteWebFunctionEndpoint(array{functionName?: string, endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebFunctionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebFunctionEndpointAsync(array{functionName?: string, endpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteWebFunctionRevision(array $args = [])
 * @phpstan-method \Aws\Result deleteWebFunctionRevision(array{functionName?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebFunctionRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebFunctionRevisionAsync(array{functionName?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getWebAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getWebAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getWebFunction(array $args = [])
 * @phpstan-method \Aws\Result getWebFunction(array{functionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebFunctionAsync(array{functionName?: string, ...} $args = [])
 * @method \Aws\Result getWebFunctionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getWebFunctionEndpoint(array{functionName?: string, endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebFunctionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebFunctionEndpointAsync(array{functionName?: string, endpointName?: string, ...} $args = [])
 * @method \Aws\Result getWebFunctionRevision(array $args = [])
 * @phpstan-method \Aws\Result getWebFunctionRevision(array{functionName?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebFunctionRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebFunctionRevisionAsync(array{functionName?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{resource?: string, ...} $args = [])
 * @method \Aws\Result listWebFunctionEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listWebFunctionEndpoints(array{
 *     functionName?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebFunctionEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebFunctionEndpointsAsync(array{
 *     functionName?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWebFunctionRevisions(array $args = [])
 * @phpstan-method \Aws\Result listWebFunctionRevisions(array{
 *     functionName?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebFunctionRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebFunctionRevisionsAsync(array{
 *     functionName?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWebFunctions(array $args = [])
 * @phpstan-method \Aws\Result listWebFunctions(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebFunctionsAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{resourceArn?: string, policy?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{resourceArn?: string, policy?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resource?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resource?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resource?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resource?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateWebFunctionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateWebFunctionEndpoint(array{
 *     functionName?: string,
 *     endpointName?: string,
 *     description?: string,
 *     authType?: 'ApplicationManaged'|'IamAuth',
 *     autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *     revisionWeights?: list<array{revisionId?: string, weight?: int, ...}>,
 *     scalingConfig?: array{maxEnvironments?: int, ...},
 *     throttleConfig?: array{rateLimit?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebFunctionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebFunctionEndpointAsync(array{
 *     functionName?: string,
 *     endpointName?: string,
 *     description?: string,
 *     authType?: 'ApplicationManaged'|'IamAuth',
 *     autoDeploymentMode?: 'Disabled'|'LatestRevision',
 *     revisionWeights?: list<array{revisionId?: string, weight?: int, ...}>,
 *     scalingConfig?: array{maxEnvironments?: int, ...},
 *     throttleConfig?: array{rateLimit?: int, ...},
 *     ...,
 * } $args = [])
 */
class LambdaWebClient extends AwsClient {}
