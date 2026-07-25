<?php
namespace Aws\LicenseManagerUserSubscriptions;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS License Manager User Subscriptions** service.
 * @method \Aws\Result associateUser(array $args = [])
 * @phpstan-method \Aws\Result associateUser(array{
 *     Username?: string,
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Domain?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateUserAsync(array{
 *     Username?: string,
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Domain?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseServerEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createLicenseServerEndpoint(array{
 *     IdentityProviderArn?: string,
 *     LicenseServerSettings?: array{ServerType?: 'RDS_SAL', ServerSettings?: array{RdsSalSettings?: array, ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseServerEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseServerEndpointAsync(array{
 *     IdentityProviderArn?: string,
 *     LicenseServerSettings?: array{ServerType?: 'RDS_SAL', ServerSettings?: array{RdsSalSettings?: array, ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLicenseServerEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseServerEndpoint(array{LicenseServerEndpointArn?: string, ServerType?: 'RDS_SAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseServerEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseServerEndpointAsync(array{LicenseServerEndpointArn?: string, ServerType?: 'RDS_SAL', ...} $args = [])
 * @method \Aws\Result deregisterIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result deregisterIdentityProvider(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     IdentityProviderArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterIdentityProviderAsync(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     IdentityProviderArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateUser(array $args = [])
 * @phpstan-method \Aws\Result disassociateUser(array{
 *     Username?: string,
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InstanceUserArn?: string,
 *     Domain?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateUserAsync(array{
 *     Username?: string,
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InstanceUserArn?: string,
 *     Domain?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIdentityProviders(array $args = [])
 * @phpstan-method \Aws\Result listIdentityProviders(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLicenseServerEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listLicenseServerEndpoints(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseServerEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseServerEndpointsAsync(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProductSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listProductSubscriptions(array{
 *     Product?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductSubscriptionsAsync(array{
 *     Product?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUserAssociations(array $args = [])
 * @phpstan-method \Aws\Result listUserAssociations(array{
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserAssociationsAsync(array{
 *     InstanceId?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     Filters?: list<array{Attribute?: string, Operation?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result registerIdentityProvider(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     Settings?: array{Subnets?: list<string>, SecurityGroupId?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerIdentityProviderAsync(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     Settings?: array{Subnets?: list<string>, SecurityGroupId?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startProductSubscription(array $args = [])
 * @phpstan-method \Aws\Result startProductSubscription(array{
 *     Username?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     Domain?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startProductSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProductSubscriptionAsync(array{
 *     Username?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     Domain?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopProductSubscription(array $args = [])
 * @phpstan-method \Aws\Result stopProductSubscription(array{
 *     Username?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     ProductUserArn?: string,
 *     Domain?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopProductSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopProductSubscriptionAsync(array{
 *     Username?: string,
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     ProductUserArn?: string,
 *     Domain?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIdentityProviderSettings(array $args = [])
 * @phpstan-method \Aws\Result updateIdentityProviderSettings(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     IdentityProviderArn?: string,
 *     UpdateSettings?: array{AddSubnets?: list<string>, RemoveSubnets?: list<string>, SecurityGroupId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentityProviderSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentityProviderSettingsAsync(array{
 *     IdentityProvider?: array{
 *         ActiveDirectoryIdentityProvider?: array{
 *             DirectoryId?: string,
 *             ActiveDirectorySettings?: array,
 *             ActiveDirectoryType?: 'AWS_MANAGED'|'SELF_MANAGED',
 *             IsSharedActiveDirectory?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Product?: string,
 *     IdentityProviderArn?: string,
 *     UpdateSettings?: array{AddSubnets?: list<string>, RemoveSubnets?: list<string>, SecurityGroupId?: string, ...},
 *     ...,
 * } $args = [])
 */
class LicenseManagerUserSubscriptionsClient extends AwsClient {}
