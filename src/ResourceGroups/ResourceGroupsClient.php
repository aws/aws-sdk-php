<?php
namespace Aws\ResourceGroups;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Groups** service.
 * @method \Aws\Result cancelTagSyncTask(array $args = [])
 * @phpstan-method \Aws\Result cancelTagSyncTask(array{TaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTagSyncTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTagSyncTaskAsync(array{TaskArn?: string, ...} $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{
 *     Name?: string,
 *     Description?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     Tags?: array<string, string>,
 *     Configuration?: list<array{Type?: string, Parameters?: list<array>, ...}>,
 *     Criticality?: int,
 *     Owner?: string,
 *     DisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     Tags?: array<string, string>,
 *     Configuration?: list<array{Type?: string, Parameters?: list<array>, ...}>,
 *     Criticality?: int,
 *     Owner?: string,
 *     DisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \Aws\Result getGroupConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getGroupConfiguration(array{Group?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupConfigurationAsync(array{Group?: string, ...} $args = [])
 * @method \Aws\Result getGroupQuery(array $args = [])
 * @phpstan-method \Aws\Result getGroupQuery(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupQueryAsync(array{GroupName?: string, Group?: string, ...} $args = [])
 * @method \Aws\Result getTagSyncTask(array $args = [])
 * @phpstan-method \Aws\Result getTagSyncTask(array{TaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagSyncTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagSyncTaskAsync(array{TaskArn?: string, ...} $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @phpstan-method \Aws\Result getTags(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagsAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result groupResources(array $args = [])
 * @phpstan-method \Aws\Result groupResources(array{Group?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise groupResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise groupResourcesAsync(array{Group?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result listGroupResources(array $args = [])
 * @phpstan-method \Aws\Result listGroupResources(array{
 *     GroupName?: string,
 *     Group?: string,
 *     Filters?: list<array{Name?: 'resource-type', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupResourcesAsync(array{
 *     GroupName?: string,
 *     Group?: string,
 *     Filters?: list<array{Name?: 'resource-type', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroupingStatuses(array $args = [])
 * @phpstan-method \Aws\Result listGroupingStatuses(array{
 *     Group?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: 'resource-arn'|'status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupingStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupingStatusesAsync(array{
 *     Group?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: 'resource-arn'|'status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{
 *     Filters?: list<array{
 *         Name?: 'configuration-type'|'criticality'|'display-name'|'owner'|'resource-type',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{
 *     Filters?: list<array{
 *         Name?: 'configuration-type'|'criticality'|'display-name'|'owner'|'resource-type',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagSyncTasks(array $args = [])
 * @phpstan-method \Aws\Result listTagSyncTasks(array{
 *     Filters?: list<array{GroupArn?: string, GroupName?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagSyncTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagSyncTasksAsync(array{
 *     Filters?: list<array{GroupArn?: string, GroupName?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putGroupConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putGroupConfiguration(array{Group?: string, Configuration?: list<array{Type?: string, Parameters?: list<array>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putGroupConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGroupConfigurationAsync(array{Group?: string, Configuration?: list<array{Type?: string, Parameters?: list<array>, ...}>, ...} $args = [])
 * @method \Aws\Result searchResources(array $args = [])
 * @phpstan-method \Aws\Result searchResources(array{
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchResourcesAsync(array{
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTagSyncTask(array $args = [])
 * @phpstan-method \Aws\Result startTagSyncTask(array{
 *     Group?: string,
 *     TagKey?: string,
 *     TagValue?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTagSyncTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTagSyncTaskAsync(array{
 *     Group?: string,
 *     TagKey?: string,
 *     TagValue?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tag(array $args = [])
 * @phpstan-method \Aws\Result tag(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagAsync(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result ungroupResources(array $args = [])
 * @phpstan-method \Aws\Result ungroupResources(array{Group?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise ungroupResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise ungroupResourcesAsync(array{Group?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result untag(array $args = [])
 * @phpstan-method \Aws\Result untag(array{Arn?: string, Keys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagAsync(array{Arn?: string, Keys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{GroupLifecycleEventsDesiredStatus?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{GroupLifecycleEventsDesiredStatus?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{
 *     GroupName?: string,
 *     Group?: string,
 *     Description?: string,
 *     Criticality?: int,
 *     Owner?: string,
 *     DisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{
 *     GroupName?: string,
 *     Group?: string,
 *     Description?: string,
 *     Criticality?: int,
 *     Owner?: string,
 *     DisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGroupQuery(array $args = [])
 * @phpstan-method \Aws\Result updateGroupQuery(array{
 *     GroupName?: string,
 *     Group?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupQueryAsync(array{
 *     GroupName?: string,
 *     Group?: string,
 *     ResourceQuery?: array{Type?: 'CLOUDFORMATION_STACK_1_0'|'TAG_FILTERS_1_0', Query?: string, ...},
 *     ...,
 * } $args = [])
 */
class ResourceGroupsClient extends AwsClient {}
