<?php
namespace Aws\DLM;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Data Lifecycle Manager** service.
 * @method \Aws\Result createLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result createLifecyclePolicy(array{
 *     ExecutionRoleArn?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     PolicyDetails?: array{
 *         PolicyType?: 'EBS_SNAPSHOT_MANAGEMENT'|'EVENT_BASED_POLICY'|'IMAGE_MANAGEMENT',
 *         ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *         ResourceLocations?: list<'CLOUD'|'LOCAL_ZONE'|'OUTPOST'>,
 *         TargetTags?: list<array>,
 *         Schedules?: list<array>,
 *         Parameters?: array{ExcludeBootVolume?: bool, NoReboot?: bool, ExcludeDataVolumeTags?: list<array>, ...},
 *         EventSource?: array{Type?: 'MANAGED_CWE', Parameters?: array, ...},
 *         Actions?: list<array>,
 *         PolicyLanguage?: 'SIMPLIFIED'|'STANDARD',
 *         ResourceType?: 'INSTANCE'|'VOLUME',
 *         CreateInterval?: int,
 *         RetainInterval?: int,
 *         CopyTags?: bool,
 *         CrossRegionCopyTargets?: list<array>,
 *         ExtendDeletion?: bool,
 *         Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     DefaultPolicy?: 'INSTANCE'|'VOLUME',
 *     CreateInterval?: int,
 *     RetainInterval?: int,
 *     CopyTags?: bool,
 *     ExtendDeletion?: bool,
 *     CrossRegionCopyTargets?: list<array{TargetRegion?: string, ...}>,
 *     Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array{
 *     ExecutionRoleArn?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     PolicyDetails?: array{
 *         PolicyType?: 'EBS_SNAPSHOT_MANAGEMENT'|'EVENT_BASED_POLICY'|'IMAGE_MANAGEMENT',
 *         ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *         ResourceLocations?: list<'CLOUD'|'LOCAL_ZONE'|'OUTPOST'>,
 *         TargetTags?: list<array>,
 *         Schedules?: list<array>,
 *         Parameters?: array{ExcludeBootVolume?: bool, NoReboot?: bool, ExcludeDataVolumeTags?: list<array>, ...},
 *         EventSource?: array{Type?: 'MANAGED_CWE', Parameters?: array, ...},
 *         Actions?: list<array>,
 *         PolicyLanguage?: 'SIMPLIFIED'|'STANDARD',
 *         ResourceType?: 'INSTANCE'|'VOLUME',
 *         CreateInterval?: int,
 *         RetainInterval?: int,
 *         CopyTags?: bool,
 *         CrossRegionCopyTargets?: list<array>,
 *         ExtendDeletion?: bool,
 *         Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     DefaultPolicy?: 'INSTANCE'|'VOLUME',
 *     CreateInterval?: int,
 *     RetainInterval?: int,
 *     CopyTags?: bool,
 *     ExtendDeletion?: bool,
 *     CrossRegionCopyTargets?: list<array{TargetRegion?: string, ...}>,
 *     Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecyclePolicy(array{PolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array{PolicyId?: string, ...} $args = [])
 * @method \Aws\Result getLifecyclePolicies(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicies(array{
 *     PolicyIds?: list<string>,
 *     State?: 'DISABLED'|'ENABLED'|'ERROR',
 *     ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *     TargetTags?: list<string>,
 *     TagsToAdd?: list<string>,
 *     DefaultPolicyType?: 'ALL'|'INSTANCE'|'VOLUME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePoliciesAsync(array{
 *     PolicyIds?: list<string>,
 *     State?: 'DISABLED'|'ENABLED'|'ERROR',
 *     ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *     TargetTags?: list<string>,
 *     TagsToAdd?: list<string>,
 *     DefaultPolicyType?: 'ALL'|'INSTANCE'|'VOLUME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicy(array{PolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array{PolicyId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result updateLifecyclePolicy(array{
 *     PolicyId?: string,
 *     ExecutionRoleArn?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     Description?: string,
 *     PolicyDetails?: array{
 *         PolicyType?: 'EBS_SNAPSHOT_MANAGEMENT'|'EVENT_BASED_POLICY'|'IMAGE_MANAGEMENT',
 *         ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *         ResourceLocations?: list<'CLOUD'|'LOCAL_ZONE'|'OUTPOST'>,
 *         TargetTags?: list<array>,
 *         Schedules?: list<array>,
 *         Parameters?: array{ExcludeBootVolume?: bool, NoReboot?: bool, ExcludeDataVolumeTags?: list<array>, ...},
 *         EventSource?: array{Type?: 'MANAGED_CWE', Parameters?: array, ...},
 *         Actions?: list<array>,
 *         PolicyLanguage?: 'SIMPLIFIED'|'STANDARD',
 *         ResourceType?: 'INSTANCE'|'VOLUME',
 *         CreateInterval?: int,
 *         RetainInterval?: int,
 *         CopyTags?: bool,
 *         CrossRegionCopyTargets?: list<array>,
 *         ExtendDeletion?: bool,
 *         Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *         ...,
 *     },
 *     CreateInterval?: int,
 *     RetainInterval?: int,
 *     CopyTags?: bool,
 *     ExtendDeletion?: bool,
 *     CrossRegionCopyTargets?: list<array{TargetRegion?: string, ...}>,
 *     Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array{
 *     PolicyId?: string,
 *     ExecutionRoleArn?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     Description?: string,
 *     PolicyDetails?: array{
 *         PolicyType?: 'EBS_SNAPSHOT_MANAGEMENT'|'EVENT_BASED_POLICY'|'IMAGE_MANAGEMENT',
 *         ResourceTypes?: list<'INSTANCE'|'VOLUME'>,
 *         ResourceLocations?: list<'CLOUD'|'LOCAL_ZONE'|'OUTPOST'>,
 *         TargetTags?: list<array>,
 *         Schedules?: list<array>,
 *         Parameters?: array{ExcludeBootVolume?: bool, NoReboot?: bool, ExcludeDataVolumeTags?: list<array>, ...},
 *         EventSource?: array{Type?: 'MANAGED_CWE', Parameters?: array, ...},
 *         Actions?: list<array>,
 *         PolicyLanguage?: 'SIMPLIFIED'|'STANDARD',
 *         ResourceType?: 'INSTANCE'|'VOLUME',
 *         CreateInterval?: int,
 *         RetainInterval?: int,
 *         CopyTags?: bool,
 *         CrossRegionCopyTargets?: list<array>,
 *         ExtendDeletion?: bool,
 *         Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *         ...,
 *     },
 *     CreateInterval?: int,
 *     RetainInterval?: int,
 *     CopyTags?: bool,
 *     ExtendDeletion?: bool,
 *     CrossRegionCopyTargets?: list<array{TargetRegion?: string, ...}>,
 *     Exclusions?: array{ExcludeBootVolumes?: bool, ExcludeVolumeTypes?: list<string>, ExcludeTags?: list<array>, ...},
 *     ...,
 * } $args = [])
 */
class DLMClient extends AwsClient {}
