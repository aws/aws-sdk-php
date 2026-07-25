<?php
namespace Aws\Schemas;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Schemas** service.
 * @method \Aws\Result createDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result createDiscoverer(array{Description?: string, SourceArn?: string, CrossAccount?: bool, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDiscovererAsync(array{Description?: string, SourceArn?: string, CrossAccount?: bool, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createRegistry(array $args = [])
 * @phpstan-method \Aws\Result createRegistry(array{Description?: string, RegistryName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryAsync(array{Description?: string, RegistryName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createSchema(array $args = [])
 * @phpstan-method \Aws\Result createSchema(array{
 *     Content?: string,
 *     Description?: string,
 *     RegistryName?: string,
 *     SchemaName?: string,
 *     Tags?: array<string, string>,
 *     Type?: 'OpenApi3',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchemaAsync(array{
 *     Content?: string,
 *     Description?: string,
 *     RegistryName?: string,
 *     SchemaName?: string,
 *     Tags?: array<string, string>,
 *     Type?: 'OpenApi3',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result deleteDiscoverer(array{DiscovererId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDiscovererAsync(array{DiscovererId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistry(array{RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array{RegistryName?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{RegistryName?: string, ...} $args = [])
 * @method \Aws\Result deleteSchema(array $args = [])
 * @phpstan-method \Aws\Result deleteSchema(array{RegistryName?: string, SchemaName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array{RegistryName?: string, SchemaName?: string, ...} $args = [])
 * @method \Aws\Result deleteSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteSchemaVersion(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaVersionAsync(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result describeCodeBinding(array $args = [])
 * @phpstan-method \Aws\Result describeCodeBinding(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCodeBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCodeBindingAsync(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result describeDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result describeDiscoverer(array{DiscovererId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDiscovererAsync(array{DiscovererId?: string, ...} $args = [])
 * @method \Aws\Result describeRegistry(array $args = [])
 * @phpstan-method \Aws\Result describeRegistry(array{RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistryAsync(array{RegistryName?: string, ...} $args = [])
 * @method \Aws\Result describeSchema(array $args = [])
 * @phpstan-method \Aws\Result describeSchema(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSchemaAsync(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result getCodeBindingSource(array $args = [])
 * @phpstan-method \Aws\Result getCodeBindingSource(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeBindingSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeBindingSourceAsync(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result getDiscoveredSchema(array $args = [])
 * @phpstan-method \Aws\Result getDiscoveredSchema(array{Events?: list<string>, Type?: 'OpenApi3', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiscoveredSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiscoveredSchemaAsync(array{Events?: list<string>, Type?: 'OpenApi3', ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{RegistryName?: string, ...} $args = [])
 * @method \Aws\Result listDiscoverers(array $args = [])
 * @phpstan-method \Aws\Result listDiscoverers(array{DiscovererIdPrefix?: string, Limit?: int, NextToken?: string, SourceArnPrefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoverersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoverersAsync(array{DiscovererIdPrefix?: string, Limit?: int, NextToken?: string, SourceArnPrefix?: string, ...} $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @phpstan-method \Aws\Result listRegistries(array{Limit?: int, NextToken?: string, RegistryNamePrefix?: string, Scope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistriesAsync(array{Limit?: int, NextToken?: string, RegistryNamePrefix?: string, Scope?: string, ...} $args = [])
 * @method \Aws\Result listSchemaVersions(array $args = [])
 * @phpstan-method \Aws\Result listSchemaVersions(array{Limit?: int, NextToken?: string, RegistryName?: string, SchemaName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array{Limit?: int, NextToken?: string, RegistryName?: string, SchemaName?: string, ...} $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @phpstan-method \Aws\Result listSchemas(array{Limit?: int, NextToken?: string, RegistryName?: string, SchemaNamePrefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemasAsync(array{Limit?: int, NextToken?: string, RegistryName?: string, SchemaNamePrefix?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putCodeBinding(array $args = [])
 * @phpstan-method \Aws\Result putCodeBinding(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putCodeBindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCodeBindingAsync(array{Language?: string, RegistryName?: string, SchemaName?: string, SchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{Policy?: string, RegistryName?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{Policy?: string, RegistryName?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result searchSchemas(array $args = [])
 * @phpstan-method \Aws\Result searchSchemas(array{Keywords?: string, Limit?: int, NextToken?: string, RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSchemasAsync(array{Keywords?: string, Limit?: int, NextToken?: string, RegistryName?: string, ...} $args = [])
 * @method \Aws\Result startDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result startDiscoverer(array{DiscovererId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDiscovererAsync(array{DiscovererId?: string, ...} $args = [])
 * @method \Aws\Result stopDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result stopDiscoverer(array{DiscovererId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDiscovererAsync(array{DiscovererId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDiscoverer(array $args = [])
 * @phpstan-method \Aws\Result updateDiscoverer(array{Description?: string, DiscovererId?: string, CrossAccount?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDiscovererAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDiscovererAsync(array{Description?: string, DiscovererId?: string, CrossAccount?: bool, ...} $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @phpstan-method \Aws\Result updateRegistry(array{Description?: string, RegistryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryAsync(array{Description?: string, RegistryName?: string, ...} $args = [])
 * @method \Aws\Result updateSchema(array $args = [])
 * @phpstan-method \Aws\Result updateSchema(array{
 *     ClientTokenId?: string,
 *     Content?: string,
 *     Description?: string,
 *     RegistryName?: string,
 *     SchemaName?: string,
 *     Type?: 'OpenApi3',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSchemaAsync(array{
 *     ClientTokenId?: string,
 *     Content?: string,
 *     Description?: string,
 *     RegistryName?: string,
 *     SchemaName?: string,
 *     Type?: 'OpenApi3',
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportSchema(array $args = [])
 * @phpstan-method \Aws\Result exportSchema(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, Type?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportSchemaAsync(array{RegistryName?: string, SchemaName?: string, SchemaVersion?: string, Type?: string, ...} $args = [])
 */
class SchemasClient extends AwsClient {}
