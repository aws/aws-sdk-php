<?php
namespace Aws\MigrationHubRefactorSpaces;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Refactor Spaces** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     ApiGatewayProxy?: array{EndpointType?: 'PRIVATE'|'REGIONAL', StageName?: string, ...},
 *     ClientToken?: string,
 *     EnvironmentIdentifier?: string,
 *     Name?: string,
 *     ProxyType?: 'API_GATEWAY',
 *     Tags?: array<string, string>,
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     ApiGatewayProxy?: array{EndpointType?: 'PRIVATE'|'REGIONAL', StageName?: string, ...},
 *     ClientToken?: string,
 *     EnvironmentIdentifier?: string,
 *     Name?: string,
 *     ProxyType?: 'API_GATEWAY',
 *     Tags?: array<string, string>,
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Name?: string,
 *     NetworkFabricType?: 'NONE'|'TRANSIT_GATEWAY',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Name?: string,
 *     NetworkFabricType?: 'NONE'|'TRANSIT_GATEWAY',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoute(array $args = [])
 * @phpstan-method \Aws\Result createRoute(array{
 *     ApplicationIdentifier?: string,
 *     ClientToken?: string,
 *     DefaultRoute?: array{ActivationState?: 'ACTIVE'|'INACTIVE', ...},
 *     EnvironmentIdentifier?: string,
 *     RouteType?: 'DEFAULT'|'URI_PATH',
 *     ServiceIdentifier?: string,
 *     Tags?: array<string, string>,
 *     UriPathRoute?: array{
 *         ActivationState?: 'ACTIVE'|'INACTIVE',
 *         AppendSourcePath?: bool,
 *         IncludeChildPaths?: bool,
 *         Methods?: list<'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT'>,
 *         SourcePath?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouteAsync(array{
 *     ApplicationIdentifier?: string,
 *     ClientToken?: string,
 *     DefaultRoute?: array{ActivationState?: 'ACTIVE'|'INACTIVE', ...},
 *     EnvironmentIdentifier?: string,
 *     RouteType?: 'DEFAULT'|'URI_PATH',
 *     ServiceIdentifier?: string,
 *     Tags?: array<string, string>,
 *     UriPathRoute?: array{
 *         ActivationState?: 'ACTIVE'|'INACTIVE',
 *         AppendSourcePath?: bool,
 *         IncludeChildPaths?: bool,
 *         Methods?: list<'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT'>,
 *         SourcePath?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     ApplicationIdentifier?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     EndpointType?: 'LAMBDA'|'URL',
 *     EnvironmentIdentifier?: string,
 *     LambdaEndpoint?: array{Arn?: string, ...},
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     UrlEndpoint?: array{HealthUrl?: string, Url?: string, ...},
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     ApplicationIdentifier?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     EndpointType?: 'LAMBDA'|'URL',
 *     EnvironmentIdentifier?: string,
 *     LambdaEndpoint?: array{Arn?: string, ...},
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     UrlEndpoint?: array{HealthUrl?: string, Url?: string, ...},
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{EnvironmentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{EnvironmentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteRoute(array $args = [])
 * @phpstan-method \Aws\Result deleteRoute(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, RouteIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, RouteIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ServiceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ServiceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{EnvironmentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{EnvironmentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getRoute(array $args = [])
 * @phpstan-method \Aws\Result getRoute(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, RouteIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouteAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, RouteIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ServiceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{ApplicationIdentifier?: string, EnvironmentIdentifier?: string, ServiceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{EnvironmentIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{EnvironmentIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentVpcs(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentVpcs(array{EnvironmentIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentVpcsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentVpcsAsync(array{EnvironmentIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRoutes(array $args = [])
 * @phpstan-method \Aws\Result listRoutes(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutesAsync(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{Policy?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{Policy?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRoute(array $args = [])
 * @phpstan-method \Aws\Result updateRoute(array{
 *     ActivationState?: 'ACTIVE'|'INACTIVE',
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     RouteIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouteAsync(array{
 *     ActivationState?: 'ACTIVE'|'INACTIVE',
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     RouteIdentifier?: string,
 *     ...,
 * } $args = [])
 */
class MigrationHubRefactorSpacesClient extends AwsClient {}
