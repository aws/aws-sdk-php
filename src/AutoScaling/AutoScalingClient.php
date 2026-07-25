<?php
namespace Aws\AutoScaling;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Auto Scaling** service.
 *
 * @method \Aws\Result attachInstances(array $args = [])
 * @phpstan-method \Aws\Result attachInstances(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachInstancesAsync(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ...} $args = [])
 * @method \Aws\Result attachLoadBalancerTargetGroups(array $args = [])
 * @phpstan-method \Aws\Result attachLoadBalancerTargetGroups(array{AutoScalingGroupName?: string, TargetGroupARNs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachLoadBalancerTargetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachLoadBalancerTargetGroupsAsync(array{AutoScalingGroupName?: string, TargetGroupARNs?: list<string>, ...} $args = [])
 * @method \Aws\Result attachLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result attachLoadBalancers(array{AutoScalingGroupName?: string, LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachLoadBalancersAsync(array{AutoScalingGroupName?: string, LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \Aws\Result attachTrafficSources(array $args = [])
 * @phpstan-method \Aws\Result attachTrafficSources(array{
 *     AutoScalingGroupName?: string,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     SkipZonalShiftValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachTrafficSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachTrafficSourcesAsync(array{
 *     AutoScalingGroupName?: string,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     SkipZonalShiftValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteScheduledAction(array{AutoScalingGroupName?: string, ScheduledActionNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteScheduledActionAsync(array{AutoScalingGroupName?: string, ScheduledActionNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchPutScheduledUpdateGroupAction(array $args = [])
 * @phpstan-method \Aws\Result batchPutScheduledUpdateGroupAction(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledUpdateGroupActions?: list<array{
 *         ScheduledActionName?: string,
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         Recurrence?: string,
 *         MinSize?: int,
 *         MaxSize?: int,
 *         DesiredCapacity?: int,
 *         TimeZone?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutScheduledUpdateGroupActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutScheduledUpdateGroupActionAsync(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledUpdateGroupActions?: list<array{
 *         ScheduledActionName?: string,
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         Recurrence?: string,
 *         MinSize?: int,
 *         MaxSize?: int,
 *         DesiredCapacity?: int,
 *         TimeZone?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelInstanceRefresh(array $args = [])
 * @phpstan-method \Aws\Result cancelInstanceRefresh(array{AutoScalingGroupName?: string, WaitForTransitioningInstances?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelInstanceRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelInstanceRefreshAsync(array{AutoScalingGroupName?: string, WaitForTransitioningInstances?: bool, ...} $args = [])
 * @method \Aws\Result completeLifecycleAction(array $args = [])
 * @phpstan-method \Aws\Result completeLifecycleAction(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleActionToken?: string,
 *     LifecycleActionResult?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise completeLifecycleActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeLifecycleActionAsync(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleActionToken?: string,
 *     LifecycleActionResult?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutoScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result createAutoScalingGroup(array{
 *     AutoScalingGroupName?: string,
 *     LaunchConfigurationName?: string,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     MixedInstancesPolicy?: array{
 *         LaunchTemplate?: array{LaunchTemplateSpecification?: array, Overrides?: list<array>, ...},
 *         InstancesDistribution?: array{
 *             OnDemandAllocationStrategy?: string,
 *             OnDemandBaseCapacity?: int,
 *             OnDemandPercentageAboveBaseCapacity?: int,
 *             SpotAllocationStrategy?: string,
 *             SpotInstancePools?: int,
 *             SpotMaxPrice?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InstanceId?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     DefaultCooldown?: int,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     LoadBalancerNames?: list<string>,
 *     TargetGroupARNs?: list<string>,
 *     HealthCheckType?: string,
 *     HealthCheckGracePeriod?: int,
 *     PlacementGroup?: string,
 *     VPCZoneIdentifier?: string,
 *     TerminationPolicies?: list<string>,
 *     NewInstancesProtectedFromScaleIn?: bool,
 *     CapacityRebalance?: bool,
 *     LifecycleHookSpecificationList?: list<array{
 *         LifecycleHookName?: string,
 *         LifecycleTransition?: string,
 *         NotificationMetadata?: string,
 *         HeartbeatTimeout?: int,
 *         DefaultResult?: string,
 *         NotificationTargetARN?: string,
 *         RoleARN?: string,
 *         ...,
 *     }>,
 *     DeletionProtection?: 'none'|'prevent-all-deletion'|'prevent-force-deletion',
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ServiceLinkedRoleARN?: string,
 *     MaxInstanceLifetime?: int,
 *     Context?: string,
 *     DesiredCapacityType?: string,
 *     DefaultInstanceWarmup?: int,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     InstanceMaintenancePolicy?: array{MinHealthyPercentage?: int, MaxHealthyPercentage?: int, ...},
 *     AvailabilityZoneDistribution?: array{CapacityDistributionStrategy?: 'balanced-best-effort'|'balanced-only'|'reservations-then-balanced', ...},
 *     AvailabilityZoneImpairmentPolicy?: array{ZonalShiftEnabled?: bool, ImpairedZoneHealthCheckBehavior?: 'IgnoreUnhealthy'|'ReplaceUnhealthy', ...},
 *     SkipZonalShiftValidation?: bool,
 *     CapacityReservationSpecification?: array{
 *         CapacityReservationPreference?: 'capacity-reservations-first'|'capacity-reservations-only'|'default'|'none',
 *         CapacityReservationTarget?: array{CapacityReservationIds?: list<string>, CapacityReservationResourceGroupArns?: list<string>, ...},
 *         ...,
 *     },
 *     InstanceLifecyclePolicy?: array{RetentionTriggers?: array{TerminateHookAbandon?: 'retain'|'terminate', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutoScalingGroupAsync(array{
 *     AutoScalingGroupName?: string,
 *     LaunchConfigurationName?: string,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     MixedInstancesPolicy?: array{
 *         LaunchTemplate?: array{LaunchTemplateSpecification?: array, Overrides?: list<array>, ...},
 *         InstancesDistribution?: array{
 *             OnDemandAllocationStrategy?: string,
 *             OnDemandBaseCapacity?: int,
 *             OnDemandPercentageAboveBaseCapacity?: int,
 *             SpotAllocationStrategy?: string,
 *             SpotInstancePools?: int,
 *             SpotMaxPrice?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InstanceId?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     DefaultCooldown?: int,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     LoadBalancerNames?: list<string>,
 *     TargetGroupARNs?: list<string>,
 *     HealthCheckType?: string,
 *     HealthCheckGracePeriod?: int,
 *     PlacementGroup?: string,
 *     VPCZoneIdentifier?: string,
 *     TerminationPolicies?: list<string>,
 *     NewInstancesProtectedFromScaleIn?: bool,
 *     CapacityRebalance?: bool,
 *     LifecycleHookSpecificationList?: list<array{
 *         LifecycleHookName?: string,
 *         LifecycleTransition?: string,
 *         NotificationMetadata?: string,
 *         HeartbeatTimeout?: int,
 *         DefaultResult?: string,
 *         NotificationTargetARN?: string,
 *         RoleARN?: string,
 *         ...,
 *     }>,
 *     DeletionProtection?: 'none'|'prevent-all-deletion'|'prevent-force-deletion',
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ServiceLinkedRoleARN?: string,
 *     MaxInstanceLifetime?: int,
 *     Context?: string,
 *     DesiredCapacityType?: string,
 *     DefaultInstanceWarmup?: int,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     InstanceMaintenancePolicy?: array{MinHealthyPercentage?: int, MaxHealthyPercentage?: int, ...},
 *     AvailabilityZoneDistribution?: array{CapacityDistributionStrategy?: 'balanced-best-effort'|'balanced-only'|'reservations-then-balanced', ...},
 *     AvailabilityZoneImpairmentPolicy?: array{ZonalShiftEnabled?: bool, ImpairedZoneHealthCheckBehavior?: 'IgnoreUnhealthy'|'ReplaceUnhealthy', ...},
 *     SkipZonalShiftValidation?: bool,
 *     CapacityReservationSpecification?: array{
 *         CapacityReservationPreference?: 'capacity-reservations-first'|'capacity-reservations-only'|'default'|'none',
 *         CapacityReservationTarget?: array{CapacityReservationIds?: list<string>, CapacityReservationResourceGroupArns?: list<string>, ...},
 *         ...,
 *     },
 *     InstanceLifecyclePolicy?: array{RetentionTriggers?: array{TerminateHookAbandon?: 'retain'|'terminate', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createLaunchConfiguration(array{
 *     LaunchConfigurationName?: string,
 *     ImageId?: string,
 *     KeyName?: string,
 *     SecurityGroups?: list<string>,
 *     ClassicLinkVPCId?: string,
 *     ClassicLinkVPCSecurityGroups?: list<string>,
 *     UserData?: string,
 *     InstanceId?: string,
 *     InstanceType?: string,
 *     KernelId?: string,
 *     RamdiskId?: string,
 *     BlockDeviceMappings?: list<array{VirtualName?: string, DeviceName?: string, Ebs?: array, NoDevice?: bool, ...}>,
 *     InstanceMonitoring?: array{Enabled?: bool, ...},
 *     SpotPrice?: string,
 *     IamInstanceProfile?: string,
 *     EbsOptimized?: bool,
 *     AssociatePublicIpAddress?: bool,
 *     PlacementTenancy?: string,
 *     MetadataOptions?: array{
 *         HttpTokens?: 'optional'|'required',
 *         HttpPutResponseHopLimit?: int,
 *         HttpEndpoint?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLaunchConfigurationAsync(array{
 *     LaunchConfigurationName?: string,
 *     ImageId?: string,
 *     KeyName?: string,
 *     SecurityGroups?: list<string>,
 *     ClassicLinkVPCId?: string,
 *     ClassicLinkVPCSecurityGroups?: list<string>,
 *     UserData?: string,
 *     InstanceId?: string,
 *     InstanceType?: string,
 *     KernelId?: string,
 *     RamdiskId?: string,
 *     BlockDeviceMappings?: list<array{VirtualName?: string, DeviceName?: string, Ebs?: array, NoDevice?: bool, ...}>,
 *     InstanceMonitoring?: array{Enabled?: bool, ...},
 *     SpotPrice?: string,
 *     IamInstanceProfile?: string,
 *     EbsOptimized?: bool,
 *     AssociatePublicIpAddress?: bool,
 *     PlacementTenancy?: string,
 *     MetadataOptions?: array{
 *         HttpTokens?: 'optional'|'required',
 *         HttpPutResponseHopLimit?: int,
 *         HttpEndpoint?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOrUpdateTags(array $args = [])
 * @phpstan-method \Aws\Result createOrUpdateTags(array{
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOrUpdateTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOrUpdateTagsAsync(array{
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutoScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteAutoScalingGroup(array{AutoScalingGroupName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutoScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutoScalingGroupAsync(array{AutoScalingGroupName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLaunchConfiguration(array{LaunchConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationAsync(array{LaunchConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result deleteLifecycleHook(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecycleHook(array{LifecycleHookName?: string, AutoScalingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecycleHookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecycleHookAsync(array{LifecycleHookName?: string, AutoScalingGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationConfiguration(array{AutoScalingGroupName?: string, TopicARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array{AutoScalingGroupName?: string, TopicARN?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{AutoScalingGroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{AutoScalingGroupName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledAction(array{AutoScalingGroupName?: string, ScheduledActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array{AutoScalingGroupName?: string, ScheduledActionName?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{
 *     Tags?: list<array{ResourceId?: string, ResourceType?: string, Key?: string, Value?: string, PropagateAtLaunch?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteWarmPool(array $args = [])
 * @phpstan-method \Aws\Result deleteWarmPool(array{AutoScalingGroupName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWarmPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWarmPoolAsync(array{AutoScalingGroupName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @phpstan-method \Aws\Result describeAccountLimits(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array{...} $args = [])
 * @method \Aws\Result describeAdjustmentTypes(array $args = [])
 * @phpstan-method \Aws\Result describeAdjustmentTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAdjustmentTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAdjustmentTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeAutoScalingGroups(array $args = [])
 * @phpstan-method \Aws\Result describeAutoScalingGroups(array{
 *     AutoScalingGroupNames?: list<string>,
 *     IncludeInstances?: bool,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoScalingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoScalingGroupsAsync(array{
 *     AutoScalingGroupNames?: list<string>,
 *     IncludeInstances?: bool,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAutoScalingInstances(array $args = [])
 * @phpstan-method \Aws\Result describeAutoScalingInstances(array{InstanceIds?: list<string>, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoScalingInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoScalingInstancesAsync(array{InstanceIds?: list<string>, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeAutoScalingNotificationTypes(array $args = [])
 * @phpstan-method \Aws\Result describeAutoScalingNotificationTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoScalingNotificationTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoScalingNotificationTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeInstanceRefreshes(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceRefreshes(array{
 *     AutoScalingGroupName?: string,
 *     InstanceRefreshIds?: list<string>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceRefreshesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceRefreshesAsync(array{
 *     AutoScalingGroupName?: string,
 *     InstanceRefreshIds?: list<string>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLaunchConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeLaunchConfigurations(array{LaunchConfigurationNames?: list<string>, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLaunchConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLaunchConfigurationsAsync(array{LaunchConfigurationNames?: list<string>, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describeLifecycleHookTypes(array $args = [])
 * @phpstan-method \Aws\Result describeLifecycleHookTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLifecycleHookTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLifecycleHookTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeLifecycleHooks(array $args = [])
 * @phpstan-method \Aws\Result describeLifecycleHooks(array{AutoScalingGroupName?: string, LifecycleHookNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLifecycleHooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLifecycleHooksAsync(array{AutoScalingGroupName?: string, LifecycleHookNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeLoadBalancerTargetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancerTargetGroups(array{AutoScalingGroupName?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerTargetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancerTargetGroupsAsync(array{AutoScalingGroupName?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describeLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancers(array{AutoScalingGroupName?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array{AutoScalingGroupName?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describeMetricCollectionTypes(array $args = [])
 * @phpstan-method \Aws\Result describeMetricCollectionTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetricCollectionTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetricCollectionTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeNotificationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeNotificationConfigurations(array{AutoScalingGroupNames?: list<string>, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotificationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationConfigurationsAsync(array{AutoScalingGroupNames?: list<string>, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describePolicies(array $args = [])
 * @phpstan-method \Aws\Result describePolicies(array{
 *     AutoScalingGroupName?: string,
 *     PolicyNames?: list<string>,
 *     PolicyTypes?: list<string>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePoliciesAsync(array{
 *     AutoScalingGroupName?: string,
 *     PolicyNames?: list<string>,
 *     PolicyTypes?: list<string>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScalingActivities(array $args = [])
 * @phpstan-method \Aws\Result describeScalingActivities(array{
 *     ActivityIds?: list<string>,
 *     AutoScalingGroupName?: string,
 *     IncludeDeletedGroups?: bool,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array{
 *     ActivityIds?: list<string>,
 *     AutoScalingGroupName?: string,
 *     IncludeDeletedGroups?: bool,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScalingProcessTypes(array $args = [])
 * @phpstan-method \Aws\Result describeScalingProcessTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingProcessTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingProcessTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeScheduledActions(array $args = [])
 * @phpstan-method \Aws\Result describeScheduledActions(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledActionNames?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledActionNames?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTerminationPolicyTypes(array $args = [])
 * @phpstan-method \Aws\Result describeTerminationPolicyTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTerminationPolicyTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTerminationPolicyTypesAsync(array{...} $args = [])
 * @method \Aws\Result describeTrafficSources(array $args = [])
 * @phpstan-method \Aws\Result describeTrafficSources(array{AutoScalingGroupName?: string, TrafficSourceType?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrafficSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrafficSourcesAsync(array{AutoScalingGroupName?: string, TrafficSourceType?: string, NextToken?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describeWarmPool(array $args = [])
 * @phpstan-method \Aws\Result describeWarmPool(array{AutoScalingGroupName?: string, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWarmPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWarmPoolAsync(array{AutoScalingGroupName?: string, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result detachInstances(array $args = [])
 * @phpstan-method \Aws\Result detachInstances(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachInstancesAsync(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \Aws\Result detachLoadBalancerTargetGroups(array $args = [])
 * @phpstan-method \Aws\Result detachLoadBalancerTargetGroups(array{AutoScalingGroupName?: string, TargetGroupARNs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachLoadBalancerTargetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachLoadBalancerTargetGroupsAsync(array{AutoScalingGroupName?: string, TargetGroupARNs?: list<string>, ...} $args = [])
 * @method \Aws\Result detachLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result detachLoadBalancers(array{AutoScalingGroupName?: string, LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachLoadBalancersAsync(array{AutoScalingGroupName?: string, LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \Aws\Result detachTrafficSources(array $args = [])
 * @phpstan-method \Aws\Result detachTrafficSources(array{
 *     AutoScalingGroupName?: string,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachTrafficSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachTrafficSourcesAsync(array{
 *     AutoScalingGroupName?: string,
 *     TrafficSources?: list<array{Identifier?: string, Type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disableMetricsCollection(array $args = [])
 * @phpstan-method \Aws\Result disableMetricsCollection(array{AutoScalingGroupName?: string, Metrics?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableMetricsCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableMetricsCollectionAsync(array{AutoScalingGroupName?: string, Metrics?: list<string>, ...} $args = [])
 * @method \Aws\Result enableMetricsCollection(array $args = [])
 * @phpstan-method \Aws\Result enableMetricsCollection(array{AutoScalingGroupName?: string, Metrics?: list<string>, Granularity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableMetricsCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableMetricsCollectionAsync(array{AutoScalingGroupName?: string, Metrics?: list<string>, Granularity?: string, ...} $args = [])
 * @method \Aws\Result enterStandby(array $args = [])
 * @phpstan-method \Aws\Result enterStandby(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enterStandbyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enterStandbyAsync(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \Aws\Result executePolicy(array $args = [])
 * @phpstan-method \Aws\Result executePolicy(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     HonorCooldown?: bool,
 *     MetricValue?: float,
 *     BreachThreshold?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executePolicyAsync(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     HonorCooldown?: bool,
 *     MetricValue?: float,
 *     BreachThreshold?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exitStandby(array $args = [])
 * @phpstan-method \Aws\Result exitStandby(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exitStandbyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exitStandbyAsync(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ...} $args = [])
 * @method \Aws\Result getPredictiveScalingForecast(array $args = [])
 * @phpstan-method \Aws\Result getPredictiveScalingForecast(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPredictiveScalingForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPredictiveScalingForecastAsync(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result launchInstances(array $args = [])
 * @phpstan-method \Aws\Result launchInstances(array{
 *     AutoScalingGroupName?: string,
 *     RequestedCapacity?: int,
 *     ClientToken?: string,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     SubnetIds?: list<string>,
 *     RetryStrategy?: 'none'|'retry-with-group-configuration',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise launchInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise launchInstancesAsync(array{
 *     AutoScalingGroupName?: string,
 *     RequestedCapacity?: int,
 *     ClientToken?: string,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     SubnetIds?: list<string>,
 *     RetryStrategy?: 'none'|'retry-with-group-configuration',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLifecycleHook(array $args = [])
 * @phpstan-method \Aws\Result putLifecycleHook(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleTransition?: string,
 *     RoleARN?: string,
 *     NotificationTargetARN?: string,
 *     NotificationMetadata?: string,
 *     HeartbeatTimeout?: int,
 *     DefaultResult?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLifecycleHookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLifecycleHookAsync(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleTransition?: string,
 *     RoleARN?: string,
 *     NotificationTargetARN?: string,
 *     NotificationMetadata?: string,
 *     HeartbeatTimeout?: int,
 *     DefaultResult?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putNotificationConfiguration(array{AutoScalingGroupName?: string, TopicARN?: string, NotificationTypes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putNotificationConfigurationAsync(array{AutoScalingGroupName?: string, TopicARN?: string, NotificationTypes?: list<string>, ...} $args = [])
 * @method \Aws\Result putScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putScalingPolicy(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     PolicyType?: string,
 *     AdjustmentType?: string,
 *     MinAdjustmentStep?: int,
 *     MinAdjustmentMagnitude?: int,
 *     ScalingAdjustment?: int,
 *     Cooldown?: int,
 *     MetricAggregationType?: string,
 *     StepAdjustments?: list<array{MetricIntervalLowerBound?: float, MetricIntervalUpperBound?: float, ScalingAdjustment?: int, ...}>,
 *     EstimatedInstanceWarmup?: int,
 *     TargetTrackingConfiguration?: array{
 *         PredefinedMetricSpecification?: array{
 *             PredefinedMetricType?: 'ALBRequestCountPerTarget'|'ASGAverageCPUUtilization'|'ASGAverageNetworkIn'|'ASGAverageNetworkOut',
 *             ResourceLabel?: string,
 *             ...,
 *         },
 *         CustomizedMetricSpecification?: array{
 *             MetricName?: string,
 *             Namespace?: string,
 *             Dimensions?: list<array>,
 *             Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *             Unit?: string,
 *             Period?: int,
 *             Metrics?: list<array>,
 *             ...,
 *         },
 *         TargetValue?: float,
 *         DisableScaleIn?: bool,
 *         ...,
 *     },
 *     Enabled?: bool,
 *     PredictiveScalingConfiguration?: array{
 *         MetricSpecifications?: list<array>,
 *         Mode?: 'ForecastAndScale'|'ForecastOnly',
 *         SchedulingBufferTime?: int,
 *         MaxCapacityBreachBehavior?: 'HonorMaxCapacity'|'IncreaseMaxCapacity',
 *         MaxCapacityBuffer?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array{
 *     AutoScalingGroupName?: string,
 *     PolicyName?: string,
 *     PolicyType?: string,
 *     AdjustmentType?: string,
 *     MinAdjustmentStep?: int,
 *     MinAdjustmentMagnitude?: int,
 *     ScalingAdjustment?: int,
 *     Cooldown?: int,
 *     MetricAggregationType?: string,
 *     StepAdjustments?: list<array{MetricIntervalLowerBound?: float, MetricIntervalUpperBound?: float, ScalingAdjustment?: int, ...}>,
 *     EstimatedInstanceWarmup?: int,
 *     TargetTrackingConfiguration?: array{
 *         PredefinedMetricSpecification?: array{
 *             PredefinedMetricType?: 'ALBRequestCountPerTarget'|'ASGAverageCPUUtilization'|'ASGAverageNetworkIn'|'ASGAverageNetworkOut',
 *             ResourceLabel?: string,
 *             ...,
 *         },
 *         CustomizedMetricSpecification?: array{
 *             MetricName?: string,
 *             Namespace?: string,
 *             Dimensions?: list<array>,
 *             Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *             Unit?: string,
 *             Period?: int,
 *             Metrics?: list<array>,
 *             ...,
 *         },
 *         TargetValue?: float,
 *         DisableScaleIn?: bool,
 *         ...,
 *     },
 *     Enabled?: bool,
 *     PredictiveScalingConfiguration?: array{
 *         MetricSpecifications?: list<array>,
 *         Mode?: 'ForecastAndScale'|'ForecastOnly',
 *         SchedulingBufferTime?: int,
 *         MaxCapacityBreachBehavior?: 'HonorMaxCapacity'|'IncreaseMaxCapacity',
 *         MaxCapacityBuffer?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putScheduledUpdateGroupAction(array $args = [])
 * @phpstan-method \Aws\Result putScheduledUpdateGroupAction(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledActionName?: string,
 *     Time?: int|string|\DateTimeInterface,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Recurrence?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     TimeZone?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putScheduledUpdateGroupActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putScheduledUpdateGroupActionAsync(array{
 *     AutoScalingGroupName?: string,
 *     ScheduledActionName?: string,
 *     Time?: int|string|\DateTimeInterface,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Recurrence?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     TimeZone?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putWarmPool(array $args = [])
 * @phpstan-method \Aws\Result putWarmPool(array{
 *     AutoScalingGroupName?: string,
 *     MaxGroupPreparedCapacity?: int,
 *     MinSize?: int,
 *     PoolState?: 'Hibernated'|'Running'|'Stopped',
 *     InstanceReusePolicy?: array{ReuseOnScaleIn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putWarmPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putWarmPoolAsync(array{
 *     AutoScalingGroupName?: string,
 *     MaxGroupPreparedCapacity?: int,
 *     MinSize?: int,
 *     PoolState?: 'Hibernated'|'Running'|'Stopped',
 *     InstanceReusePolicy?: array{ReuseOnScaleIn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result recordLifecycleActionHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result recordLifecycleActionHeartbeat(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleActionToken?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise recordLifecycleActionHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recordLifecycleActionHeartbeatAsync(array{
 *     LifecycleHookName?: string,
 *     AutoScalingGroupName?: string,
 *     LifecycleActionToken?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resumeProcesses(array $args = [])
 * @phpstan-method \Aws\Result resumeProcesses(array{AutoScalingGroupName?: string, ScalingProcesses?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeProcessesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeProcessesAsync(array{AutoScalingGroupName?: string, ScalingProcesses?: list<string>, ...} $args = [])
 * @method \Aws\Result rollbackInstanceRefresh(array $args = [])
 * @phpstan-method \Aws\Result rollbackInstanceRefresh(array{AutoScalingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackInstanceRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackInstanceRefreshAsync(array{AutoScalingGroupName?: string, ...} $args = [])
 * @method \Aws\Result setDesiredCapacity(array $args = [])
 * @phpstan-method \Aws\Result setDesiredCapacity(array{AutoScalingGroupName?: string, DesiredCapacity?: int, HonorCooldown?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDesiredCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDesiredCapacityAsync(array{AutoScalingGroupName?: string, DesiredCapacity?: int, HonorCooldown?: bool, ...} $args = [])
 * @method \Aws\Result setInstanceHealth(array $args = [])
 * @phpstan-method \Aws\Result setInstanceHealth(array{InstanceId?: string, HealthStatus?: string, ShouldRespectGracePeriod?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setInstanceHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setInstanceHealthAsync(array{InstanceId?: string, HealthStatus?: string, ShouldRespectGracePeriod?: bool, ...} $args = [])
 * @method \Aws\Result setInstanceProtection(array $args = [])
 * @phpstan-method \Aws\Result setInstanceProtection(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ProtectedFromScaleIn?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setInstanceProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setInstanceProtectionAsync(array{InstanceIds?: list<string>, AutoScalingGroupName?: string, ProtectedFromScaleIn?: bool, ...} $args = [])
 * @method \Aws\Result startInstanceRefresh(array $args = [])
 * @phpstan-method \Aws\Result startInstanceRefresh(array{
 *     AutoScalingGroupName?: string,
 *     Strategy?: 'ReplaceRootVolume'|'Rolling',
 *     DesiredConfiguration?: array{
 *         LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *         MixedInstancesPolicy?: array{LaunchTemplate?: array, InstancesDistribution?: array, ...},
 *         ...,
 *     },
 *     Preferences?: array{
 *         MinHealthyPercentage?: int,
 *         InstanceWarmup?: int,
 *         CheckpointPercentages?: list<int>,
 *         CheckpointDelay?: int,
 *         SkipMatching?: bool,
 *         AutoRollback?: bool,
 *         ScaleInProtectedInstances?: 'Ignore'|'Refresh'|'Wait',
 *         StandbyInstances?: 'Ignore'|'Terminate'|'Wait',
 *         AlarmSpecification?: array{Alarms?: list<string>, ...},
 *         MaxHealthyPercentage?: int,
 *         BakeTime?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startInstanceRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInstanceRefreshAsync(array{
 *     AutoScalingGroupName?: string,
 *     Strategy?: 'ReplaceRootVolume'|'Rolling',
 *     DesiredConfiguration?: array{
 *         LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *         MixedInstancesPolicy?: array{LaunchTemplate?: array, InstancesDistribution?: array, ...},
 *         ...,
 *     },
 *     Preferences?: array{
 *         MinHealthyPercentage?: int,
 *         InstanceWarmup?: int,
 *         CheckpointPercentages?: list<int>,
 *         CheckpointDelay?: int,
 *         SkipMatching?: bool,
 *         AutoRollback?: bool,
 *         ScaleInProtectedInstances?: 'Ignore'|'Refresh'|'Wait',
 *         StandbyInstances?: 'Ignore'|'Terminate'|'Wait',
 *         AlarmSpecification?: array{Alarms?: list<string>, ...},
 *         MaxHealthyPercentage?: int,
 *         BakeTime?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result suspendProcesses(array $args = [])
 * @phpstan-method \Aws\Result suspendProcesses(array{AutoScalingGroupName?: string, ScalingProcesses?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise suspendProcessesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suspendProcessesAsync(array{AutoScalingGroupName?: string, ScalingProcesses?: list<string>, ...} $args = [])
 * @method \Aws\Result terminateInstanceInAutoScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result terminateInstanceInAutoScalingGroup(array{InstanceId?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateInstanceInAutoScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateInstanceInAutoScalingGroupAsync(array{InstanceId?: string, ShouldDecrementDesiredCapacity?: bool, ...} $args = [])
 * @method \Aws\Result updateAutoScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateAutoScalingGroup(array{
 *     AutoScalingGroupName?: string,
 *     LaunchConfigurationName?: string,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     MixedInstancesPolicy?: array{
 *         LaunchTemplate?: array{LaunchTemplateSpecification?: array, Overrides?: list<array>, ...},
 *         InstancesDistribution?: array{
 *             OnDemandAllocationStrategy?: string,
 *             OnDemandBaseCapacity?: int,
 *             OnDemandPercentageAboveBaseCapacity?: int,
 *             SpotAllocationStrategy?: string,
 *             SpotInstancePools?: int,
 *             SpotMaxPrice?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     DefaultCooldown?: int,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     HealthCheckType?: string,
 *     HealthCheckGracePeriod?: int,
 *     PlacementGroup?: string,
 *     VPCZoneIdentifier?: string,
 *     TerminationPolicies?: list<string>,
 *     NewInstancesProtectedFromScaleIn?: bool,
 *     ServiceLinkedRoleARN?: string,
 *     MaxInstanceLifetime?: int,
 *     CapacityRebalance?: bool,
 *     Context?: string,
 *     DesiredCapacityType?: string,
 *     DefaultInstanceWarmup?: int,
 *     InstanceMaintenancePolicy?: array{MinHealthyPercentage?: int, MaxHealthyPercentage?: int, ...},
 *     AvailabilityZoneDistribution?: array{CapacityDistributionStrategy?: 'balanced-best-effort'|'balanced-only'|'reservations-then-balanced', ...},
 *     AvailabilityZoneImpairmentPolicy?: array{ZonalShiftEnabled?: bool, ImpairedZoneHealthCheckBehavior?: 'IgnoreUnhealthy'|'ReplaceUnhealthy', ...},
 *     SkipZonalShiftValidation?: bool,
 *     CapacityReservationSpecification?: array{
 *         CapacityReservationPreference?: 'capacity-reservations-first'|'capacity-reservations-only'|'default'|'none',
 *         CapacityReservationTarget?: array{CapacityReservationIds?: list<string>, CapacityReservationResourceGroupArns?: list<string>, ...},
 *         ...,
 *     },
 *     InstanceLifecyclePolicy?: array{RetentionTriggers?: array{TerminateHookAbandon?: 'retain'|'terminate', ...}, ...},
 *     DeletionProtection?: 'none'|'prevent-all-deletion'|'prevent-force-deletion',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutoScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutoScalingGroupAsync(array{
 *     AutoScalingGroupName?: string,
 *     LaunchConfigurationName?: string,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     MixedInstancesPolicy?: array{
 *         LaunchTemplate?: array{LaunchTemplateSpecification?: array, Overrides?: list<array>, ...},
 *         InstancesDistribution?: array{
 *             OnDemandAllocationStrategy?: string,
 *             OnDemandBaseCapacity?: int,
 *             OnDemandPercentageAboveBaseCapacity?: int,
 *             SpotAllocationStrategy?: string,
 *             SpotInstancePools?: int,
 *             SpotMaxPrice?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MinSize?: int,
 *     MaxSize?: int,
 *     DesiredCapacity?: int,
 *     DefaultCooldown?: int,
 *     AvailabilityZones?: list<string>,
 *     AvailabilityZoneIds?: list<string>,
 *     HealthCheckType?: string,
 *     HealthCheckGracePeriod?: int,
 *     PlacementGroup?: string,
 *     VPCZoneIdentifier?: string,
 *     TerminationPolicies?: list<string>,
 *     NewInstancesProtectedFromScaleIn?: bool,
 *     ServiceLinkedRoleARN?: string,
 *     MaxInstanceLifetime?: int,
 *     CapacityRebalance?: bool,
 *     Context?: string,
 *     DesiredCapacityType?: string,
 *     DefaultInstanceWarmup?: int,
 *     InstanceMaintenancePolicy?: array{MinHealthyPercentage?: int, MaxHealthyPercentage?: int, ...},
 *     AvailabilityZoneDistribution?: array{CapacityDistributionStrategy?: 'balanced-best-effort'|'balanced-only'|'reservations-then-balanced', ...},
 *     AvailabilityZoneImpairmentPolicy?: array{ZonalShiftEnabled?: bool, ImpairedZoneHealthCheckBehavior?: 'IgnoreUnhealthy'|'ReplaceUnhealthy', ...},
 *     SkipZonalShiftValidation?: bool,
 *     CapacityReservationSpecification?: array{
 *         CapacityReservationPreference?: 'capacity-reservations-first'|'capacity-reservations-only'|'default'|'none',
 *         CapacityReservationTarget?: array{CapacityReservationIds?: list<string>, CapacityReservationResourceGroupArns?: list<string>, ...},
 *         ...,
 *     },
 *     InstanceLifecyclePolicy?: array{RetentionTriggers?: array{TerminateHookAbandon?: 'retain'|'terminate', ...}, ...},
 *     DeletionProtection?: 'none'|'prevent-all-deletion'|'prevent-force-deletion',
 *     ...,
 * } $args = [])
 */
class AutoScalingClient extends AwsClient {}
