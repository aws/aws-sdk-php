<?php
namespace Aws\LicenseManagerLinuxSubscriptions;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS License Manager Linux Subscriptions** service.
 * @method \Aws\Result deregisterSubscriptionProvider(array $args = [])
 * @phpstan-method \Aws\Result deregisterSubscriptionProvider(array{SubscriptionProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterSubscriptionProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterSubscriptionProviderAsync(array{SubscriptionProviderArn?: string, ...} $args = [])
 * @method \Aws\Result getRegisteredSubscriptionProvider(array $args = [])
 * @phpstan-method \Aws\Result getRegisteredSubscriptionProvider(array{SubscriptionProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegisteredSubscriptionProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegisteredSubscriptionProviderAsync(array{SubscriptionProviderArn?: string, ...} $args = [])
 * @method \Aws\Result getServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result getServiceSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSettingsAsync(array{...} $args = [])
 * @method \Aws\Result listLinuxSubscriptionInstances(array $args = [])
 * @phpstan-method \Aws\Result listLinuxSubscriptionInstances(array{
 *     Filters?: list<array{Name?: string, Operator?: 'Contains'|'Equal'|'NotEqual', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinuxSubscriptionInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinuxSubscriptionInstancesAsync(array{
 *     Filters?: list<array{Name?: string, Operator?: 'Contains'|'Equal'|'NotEqual', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLinuxSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listLinuxSubscriptions(array{
 *     Filters?: list<array{Name?: string, Operator?: 'Contains'|'Equal'|'NotEqual', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinuxSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinuxSubscriptionsAsync(array{
 *     Filters?: list<array{Name?: string, Operator?: 'Contains'|'Equal'|'NotEqual', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegisteredSubscriptionProviders(array $args = [])
 * @phpstan-method \Aws\Result listRegisteredSubscriptionProviders(array{MaxResults?: int, NextToken?: string, SubscriptionProviderSources?: list<'RedHat'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegisteredSubscriptionProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegisteredSubscriptionProvidersAsync(array{MaxResults?: int, NextToken?: string, SubscriptionProviderSources?: list<'RedHat'>, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerSubscriptionProvider(array $args = [])
 * @phpstan-method \Aws\Result registerSubscriptionProvider(array{SecretArn?: string, SubscriptionProviderSource?: 'RedHat', Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerSubscriptionProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerSubscriptionProviderAsync(array{SecretArn?: string, SubscriptionProviderSource?: 'RedHat', Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSettings(array{
 *     AllowUpdate?: bool,
 *     LinuxSubscriptionsDiscovery?: 'Disabled'|'Enabled',
 *     LinuxSubscriptionsDiscoverySettings?: array{OrganizationIntegration?: 'Disabled'|'Enabled', SourceRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array{
 *     AllowUpdate?: bool,
 *     LinuxSubscriptionsDiscovery?: 'Disabled'|'Enabled',
 *     LinuxSubscriptionsDiscoverySettings?: array{OrganizationIntegration?: 'Disabled'|'Enabled', SourceRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 */
class LicenseManagerLinuxSubscriptionsClient extends AwsClient {}
