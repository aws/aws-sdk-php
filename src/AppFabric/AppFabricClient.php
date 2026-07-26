<?php
namespace Aws\AppFabric;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AppFabric** service.
 * @method \Aws\Result batchGetUserAccessTasks(array $args = [])
 * @phpstan-method \Aws\Result batchGetUserAccessTasks(array{appBundleIdentifier?: string, taskIdList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetUserAccessTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetUserAccessTasksAsync(array{appBundleIdentifier?: string, taskIdList?: list<string>, ...} $args = [])
 * @method \Aws\Result connectAppAuthorization(array $args = [])
 * @phpstan-method \Aws\Result connectAppAuthorization(array{
 *     appBundleIdentifier?: string,
 *     appAuthorizationIdentifier?: string,
 *     authRequest?: array{redirectUri?: string, code?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise connectAppAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise connectAppAuthorizationAsync(array{
 *     appBundleIdentifier?: string,
 *     appAuthorizationIdentifier?: string,
 *     authRequest?: array{redirectUri?: string, code?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppAuthorization(array $args = [])
 * @phpstan-method \Aws\Result createAppAuthorization(array{
 *     appBundleIdentifier?: string,
 *     app?: string,
 *     credential?: array{
 *         oauth2Credential?: array{clientId?: string, clientSecret?: string, ...},
 *         apiKeyCredential?: array{apiKey?: string, ...},
 *         ...,
 *     },
 *     tenant?: array{tenantIdentifier?: string, tenantDisplayName?: string, ...},
 *     authType?: 'apiKey'|'oauth2',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppAuthorizationAsync(array{
 *     appBundleIdentifier?: string,
 *     app?: string,
 *     credential?: array{
 *         oauth2Credential?: array{clientId?: string, clientSecret?: string, ...},
 *         apiKeyCredential?: array{apiKey?: string, ...},
 *         ...,
 *     },
 *     tenant?: array{tenantIdentifier?: string, tenantDisplayName?: string, ...},
 *     authType?: 'apiKey'|'oauth2',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppBundle(array $args = [])
 * @phpstan-method \Aws\Result createAppBundle(array{
 *     clientToken?: string,
 *     customerManagedKeyIdentifier?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppBundleAsync(array{
 *     clientToken?: string,
 *     customerManagedKeyIdentifier?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIngestion(array $args = [])
 * @phpstan-method \Aws\Result createIngestion(array{
 *     appBundleIdentifier?: string,
 *     app?: string,
 *     tenantId?: string,
 *     ingestionType?: 'auditLog',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIngestionAsync(array{
 *     appBundleIdentifier?: string,
 *     app?: string,
 *     tenantId?: string,
 *     ingestionType?: 'auditLog',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIngestionDestination(array $args = [])
 * @phpstan-method \Aws\Result createIngestionDestination(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     processingConfiguration?: array{auditLog?: array{schema?: 'ocsf'|'raw', format?: 'json'|'parquet', ...}, ...},
 *     destinationConfiguration?: array{auditLog?: array{destination?: array, ...}, ...},
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIngestionDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIngestionDestinationAsync(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     processingConfiguration?: array{auditLog?: array{schema?: 'ocsf'|'raw', format?: 'json'|'parquet', ...}, ...},
 *     destinationConfiguration?: array{auditLog?: array{destination?: array, ...}, ...},
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAppAuthorization(array $args = [])
 * @phpstan-method \Aws\Result deleteAppAuthorization(array{appBundleIdentifier?: string, appAuthorizationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAuthorizationAsync(array{appBundleIdentifier?: string, appAuthorizationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAppBundle(array $args = [])
 * @phpstan-method \Aws\Result deleteAppBundle(array{appBundleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppBundleAsync(array{appBundleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIngestion(array $args = [])
 * @phpstan-method \Aws\Result deleteIngestion(array{appBundleIdentifier?: string, ingestionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIngestionAsync(array{appBundleIdentifier?: string, ingestionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIngestionDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteIngestionDestination(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIngestionDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIngestionDestinationAsync(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAppAuthorization(array $args = [])
 * @phpstan-method \Aws\Result getAppAuthorization(array{appBundleIdentifier?: string, appAuthorizationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppAuthorizationAsync(array{appBundleIdentifier?: string, appAuthorizationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getAppBundle(array $args = [])
 * @phpstan-method \Aws\Result getAppBundle(array{appBundleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppBundleAsync(array{appBundleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIngestion(array $args = [])
 * @phpstan-method \Aws\Result getIngestion(array{appBundleIdentifier?: string, ingestionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIngestionAsync(array{appBundleIdentifier?: string, ingestionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIngestionDestination(array $args = [])
 * @phpstan-method \Aws\Result getIngestionDestination(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getIngestionDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIngestionDestinationAsync(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAppAuthorizations(array $args = [])
 * @phpstan-method \Aws\Result listAppAuthorizations(array{appBundleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppAuthorizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppAuthorizationsAsync(array{appBundleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppBundles(array $args = [])
 * @phpstan-method \Aws\Result listAppBundles(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppBundlesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIngestionDestinations(array $args = [])
 * @phpstan-method \Aws\Result listIngestionDestinations(array{appBundleIdentifier?: string, ingestionIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngestionDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngestionDestinationsAsync(array{appBundleIdentifier?: string, ingestionIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIngestions(array $args = [])
 * @phpstan-method \Aws\Result listIngestions(array{appBundleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngestionsAsync(array{appBundleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startIngestion(array $args = [])
 * @phpstan-method \Aws\Result startIngestion(array{ingestionIdentifier?: string, appBundleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startIngestionAsync(array{ingestionIdentifier?: string, appBundleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startUserAccessTasks(array $args = [])
 * @phpstan-method \Aws\Result startUserAccessTasks(array{appBundleIdentifier?: string, email?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startUserAccessTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startUserAccessTasksAsync(array{appBundleIdentifier?: string, email?: string, ...} $args = [])
 * @method \Aws\Result stopIngestion(array $args = [])
 * @phpstan-method \Aws\Result stopIngestion(array{ingestionIdentifier?: string, appBundleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopIngestionAsync(array{ingestionIdentifier?: string, appBundleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAppAuthorization(array $args = [])
 * @phpstan-method \Aws\Result updateAppAuthorization(array{
 *     appBundleIdentifier?: string,
 *     appAuthorizationIdentifier?: string,
 *     credential?: array{
 *         oauth2Credential?: array{clientId?: string, clientSecret?: string, ...},
 *         apiKeyCredential?: array{apiKey?: string, ...},
 *         ...,
 *     },
 *     tenant?: array{tenantIdentifier?: string, tenantDisplayName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppAuthorizationAsync(array{
 *     appBundleIdentifier?: string,
 *     appAuthorizationIdentifier?: string,
 *     credential?: array{
 *         oauth2Credential?: array{clientId?: string, clientSecret?: string, ...},
 *         apiKeyCredential?: array{apiKey?: string, ...},
 *         ...,
 *     },
 *     tenant?: array{tenantIdentifier?: string, tenantDisplayName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIngestionDestination(array $args = [])
 * @phpstan-method \Aws\Result updateIngestionDestination(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     destinationConfiguration?: array{auditLog?: array{destination?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIngestionDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIngestionDestinationAsync(array{
 *     appBundleIdentifier?: string,
 *     ingestionIdentifier?: string,
 *     ingestionDestinationIdentifier?: string,
 *     destinationConfiguration?: array{auditLog?: array{destination?: array, ...}, ...},
 *     ...,
 * } $args = [])
 */
class AppFabricClient extends AwsClient {}
