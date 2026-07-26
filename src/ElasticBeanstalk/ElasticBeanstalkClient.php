<?php
namespace Aws\ElasticBeanstalk;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elastic Beanstalk** service.
 *
 * @method \Aws\Result abortEnvironmentUpdate(array $args = [])
 * @phpstan-method \Aws\Result abortEnvironmentUpdate(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise abortEnvironmentUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortEnvironmentUpdateAsync(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result applyEnvironmentManagedAction(array $args = [])
 * @phpstan-method \Aws\Result applyEnvironmentManagedAction(array{EnvironmentName?: string, EnvironmentId?: string, ActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applyEnvironmentManagedActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyEnvironmentManagedActionAsync(array{EnvironmentName?: string, EnvironmentId?: string, ActionId?: string, ...} $args = [])
 * @method \Aws\Result associateEnvironmentOperationsRole(array $args = [])
 * @phpstan-method \Aws\Result associateEnvironmentOperationsRole(array{EnvironmentName?: string, OperationsRole?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEnvironmentOperationsRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEnvironmentOperationsRoleAsync(array{EnvironmentName?: string, OperationsRole?: string, ...} $args = [])
 * @method \Aws\Result checkDNSAvailability(array $args = [])
 * @phpstan-method \Aws\Result checkDNSAvailability(array{CNAMEPrefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDNSAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkDNSAvailabilityAsync(array{CNAMEPrefix?: string, ...} $args = [])
 * @method \Aws\Result composeEnvironments(array $args = [])
 * @phpstan-method \Aws\Result composeEnvironments(array{ApplicationName?: string, GroupName?: string, VersionLabels?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise composeEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise composeEnvironmentsAsync(array{ApplicationName?: string, GroupName?: string, VersionLabels?: list<string>, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     ApplicationName?: string,
 *     Description?: string,
 *     ResourceLifecycleConfig?: array{
 *         ServiceRole?: string,
 *         VersionLifecycleConfig?: array{MaxCountRule?: array, MaxAgeRule?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     ApplicationName?: string,
 *     Description?: string,
 *     ResourceLifecycleConfig?: array{
 *         ServiceRole?: string,
 *         VersionLifecycleConfig?: array{MaxCountRule?: array, MaxAgeRule?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result createApplicationVersion(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     Description?: string,
 *     SourceBuildInformation?: array{SourceType?: 'Git'|'Zip', SourceRepository?: 'CodeCommit'|'S3', SourceLocation?: string, ...},
 *     SourceBundle?: array{S3Bucket?: string, S3Key?: string, ...},
 *     BuildConfiguration?: array{
 *         ArtifactName?: string,
 *         CodeBuildServiceRole?: string,
 *         ComputeType?: 'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL',
 *         Image?: string,
 *         TimeoutInMinutes?: int,
 *         ...,
 *     },
 *     AutoCreateApplication?: bool,
 *     Process?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationVersionAsync(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     Description?: string,
 *     SourceBuildInformation?: array{SourceType?: 'Git'|'Zip', SourceRepository?: 'CodeCommit'|'S3', SourceLocation?: string, ...},
 *     SourceBundle?: array{S3Bucket?: string, S3Key?: string, ...},
 *     BuildConfiguration?: array{
 *         ArtifactName?: string,
 *         CodeBuildServiceRole?: string,
 *         ComputeType?: 'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL',
 *         Image?: string,
 *         TimeoutInMinutes?: int,
 *         ...,
 *     },
 *     AutoCreateApplication?: bool,
 *     Process?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationTemplate(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     SourceConfiguration?: array{ApplicationName?: string, TemplateName?: string, ...},
 *     EnvironmentId?: string,
 *     Description?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationTemplateAsync(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     SourceConfiguration?: array{ApplicationName?: string, TemplateName?: string, ...},
 *     EnvironmentId?: string,
 *     Description?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     ApplicationName?: string,
 *     EnvironmentName?: string,
 *     GroupName?: string,
 *     Description?: string,
 *     CNAMEPrefix?: string,
 *     Tier?: array{Name?: string, Type?: string, Version?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     OperationsRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     ApplicationName?: string,
 *     EnvironmentName?: string,
 *     GroupName?: string,
 *     Description?: string,
 *     CNAMEPrefix?: string,
 *     Tier?: array{Name?: string, Type?: string, Version?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     OperationsRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPlatformVersion(array $args = [])
 * @phpstan-method \Aws\Result createPlatformVersion(array{
 *     PlatformName?: string,
 *     PlatformVersion?: string,
 *     PlatformDefinitionBundle?: array{S3Bucket?: string, S3Key?: string, ...},
 *     EnvironmentName?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlatformVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlatformVersionAsync(array{
 *     PlatformName?: string,
 *     PlatformVersion?: string,
 *     PlatformDefinitionBundle?: array{S3Bucket?: string, S3Key?: string, ...},
 *     EnvironmentName?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStorageLocation(array $args = [])
 * @phpstan-method \Aws\Result createStorageLocation(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorageLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorageLocationAsync(array{...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationName?: string, TerminateEnvByForce?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationName?: string, TerminateEnvByForce?: bool, ...} $args = [])
 * @method \Aws\Result deleteApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationVersion(array{ApplicationName?: string, VersionLabel?: string, DeleteSourceBundle?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationVersionAsync(array{ApplicationName?: string, VersionLabel?: string, DeleteSourceBundle?: bool, ...} $args = [])
 * @method \Aws\Result deleteConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationTemplate(array{ApplicationName?: string, TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationTemplateAsync(array{ApplicationName?: string, TemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentConfiguration(array{ApplicationName?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentConfigurationAsync(array{ApplicationName?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result deletePlatformVersion(array $args = [])
 * @phpstan-method \Aws\Result deletePlatformVersion(array{PlatformArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlatformVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlatformVersionAsync(array{PlatformArn?: string, ...} $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAttributes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array{...} $args = [])
 * @method \Aws\Result describeApplicationVersions(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationVersions(array{ApplicationName?: string, VersionLabels?: list<string>, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationVersionsAsync(array{ApplicationName?: string, VersionLabels?: list<string>, MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeApplications(array $args = [])
 * @phpstan-method \Aws\Result describeApplications(array{ApplicationNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array{ApplicationNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeConfigurationOptions(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationOptions(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     EnvironmentName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     Options?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationOptionsAsync(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     EnvironmentName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     Options?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConfigurationSettings(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationSettings(array{ApplicationName?: string, TemplateName?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationSettingsAsync(array{ApplicationName?: string, TemplateName?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result describeEnvironmentHealth(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentHealth(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     AttributeNames?: list<'All'|'ApplicationMetrics'|'Causes'|'Color'|'HealthStatus'|'InstancesHealth'|'RefreshedAt'|'Status'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentHealthAsync(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     AttributeNames?: list<'All'|'ApplicationMetrics'|'Causes'|'Color'|'HealthStatus'|'InstancesHealth'|'RefreshedAt'|'Status'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEnvironmentManagedActionHistory(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentManagedActionHistory(array{EnvironmentId?: string, EnvironmentName?: string, NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentManagedActionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentManagedActionHistoryAsync(array{EnvironmentId?: string, EnvironmentName?: string, NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result describeEnvironmentManagedActions(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentManagedActions(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     Status?: 'Pending'|'Running'|'Scheduled'|'Unknown',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentManagedActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentManagedActionsAsync(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     Status?: 'Pending'|'Running'|'Scheduled'|'Unknown',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEnvironmentResources(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentResources(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentResourcesAsync(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result describeEnvironments(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironments(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     EnvironmentIds?: list<string>,
 *     EnvironmentNames?: list<string>,
 *     IncludeDeleted?: bool,
 *     IncludedDeletedBackTo?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentsAsync(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     EnvironmentIds?: list<string>,
 *     EnvironmentNames?: list<string>,
 *     IncludeDeleted?: bool,
 *     IncludedDeletedBackTo?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     EnvironmentId?: string,
 *     EnvironmentName?: string,
 *     PlatformArn?: string,
 *     RequestId?: string,
 *     Severity?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     ApplicationName?: string,
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     EnvironmentId?: string,
 *     EnvironmentName?: string,
 *     PlatformArn?: string,
 *     RequestId?: string,
 *     Severity?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstancesHealth(array $args = [])
 * @phpstan-method \Aws\Result describeInstancesHealth(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     AttributeNames?: list<'All'|'ApplicationMetrics'|'AvailabilityZone'|'Causes'|'Color'|'Deployment'|'HealthStatus'|'InstanceType'|'LaunchedAt'|'RefreshedAt'|'System'>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancesHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancesHealthAsync(array{
 *     EnvironmentName?: string,
 *     EnvironmentId?: string,
 *     AttributeNames?: list<'All'|'ApplicationMetrics'|'AvailabilityZone'|'Causes'|'Color'|'Deployment'|'HealthStatus'|'InstanceType'|'LaunchedAt'|'RefreshedAt'|'System'>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePlatformVersion(array $args = [])
 * @phpstan-method \Aws\Result describePlatformVersion(array{PlatformArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePlatformVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePlatformVersionAsync(array{PlatformArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateEnvironmentOperationsRole(array $args = [])
 * @phpstan-method \Aws\Result disassociateEnvironmentOperationsRole(array{EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateEnvironmentOperationsRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateEnvironmentOperationsRoleAsync(array{EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result listAvailableSolutionStacks(array $args = [])
 * @phpstan-method \Aws\Result listAvailableSolutionStacks(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableSolutionStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableSolutionStacksAsync(array{...} $args = [])
 * @method \Aws\Result listPlatformBranches(array $args = [])
 * @phpstan-method \Aws\Result listPlatformBranches(array{
 *     Filters?: list<array{Attribute?: string, Operator?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlatformBranchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlatformBranchesAsync(array{
 *     Filters?: list<array{Attribute?: string, Operator?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPlatformVersions(array $args = [])
 * @phpstan-method \Aws\Result listPlatformVersions(array{
 *     Filters?: list<array{Type?: string, Operator?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlatformVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlatformVersionsAsync(array{
 *     Filters?: list<array{Type?: string, Operator?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result rebuildEnvironment(array $args = [])
 * @phpstan-method \Aws\Result rebuildEnvironment(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebuildEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebuildEnvironmentAsync(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result requestEnvironmentInfo(array $args = [])
 * @phpstan-method \Aws\Result requestEnvironmentInfo(array{EnvironmentId?: string, EnvironmentName?: string, InfoType?: 'analyze'|'bundle'|'tail', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise requestEnvironmentInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestEnvironmentInfoAsync(array{EnvironmentId?: string, EnvironmentName?: string, InfoType?: 'analyze'|'bundle'|'tail', ...} $args = [])
 * @method \Aws\Result restartAppServer(array $args = [])
 * @phpstan-method \Aws\Result restartAppServer(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restartAppServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restartAppServerAsync(array{EnvironmentId?: string, EnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result retrieveEnvironmentInfo(array $args = [])
 * @phpstan-method \Aws\Result retrieveEnvironmentInfo(array{EnvironmentId?: string, EnvironmentName?: string, InfoType?: 'analyze'|'bundle'|'tail', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveEnvironmentInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveEnvironmentInfoAsync(array{EnvironmentId?: string, EnvironmentName?: string, InfoType?: 'analyze'|'bundle'|'tail', ...} $args = [])
 * @method \Aws\Result swapEnvironmentCNAMEs(array $args = [])
 * @phpstan-method \Aws\Result swapEnvironmentCNAMEs(array{
 *     SourceEnvironmentId?: string,
 *     SourceEnvironmentName?: string,
 *     DestinationEnvironmentId?: string,
 *     DestinationEnvironmentName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise swapEnvironmentCNAMEsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise swapEnvironmentCNAMEsAsync(array{
 *     SourceEnvironmentId?: string,
 *     SourceEnvironmentName?: string,
 *     DestinationEnvironmentId?: string,
 *     DestinationEnvironmentName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result terminateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result terminateEnvironment(array{EnvironmentId?: string, EnvironmentName?: string, TerminateResources?: bool, ForceTerminate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateEnvironmentAsync(array{EnvironmentId?: string, EnvironmentName?: string, TerminateResources?: bool, ForceTerminate?: bool, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{ApplicationName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{ApplicationName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateApplicationResourceLifecycle(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationResourceLifecycle(array{
 *     ApplicationName?: string,
 *     ResourceLifecycleConfig?: array{
 *         ServiceRole?: string,
 *         VersionLifecycleConfig?: array{MaxCountRule?: array, MaxAgeRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationResourceLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationResourceLifecycleAsync(array{
 *     ApplicationName?: string,
 *     ResourceLifecycleConfig?: array{
 *         ServiceRole?: string,
 *         VersionLifecycleConfig?: array{MaxCountRule?: array, MaxAgeRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationVersion(array{ApplicationName?: string, VersionLabel?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationVersionAsync(array{ApplicationName?: string, VersionLabel?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationTemplate(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     Description?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationTemplateAsync(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     Description?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     ApplicationName?: string,
 *     EnvironmentId?: string,
 *     EnvironmentName?: string,
 *     GroupName?: string,
 *     Description?: string,
 *     Tier?: array{Name?: string, Type?: string, Version?: string, ...},
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     ApplicationName?: string,
 *     EnvironmentId?: string,
 *     EnvironmentName?: string,
 *     GroupName?: string,
 *     Description?: string,
 *     Tier?: array{Name?: string, Type?: string, Version?: string, ...},
 *     VersionLabel?: string,
 *     TemplateName?: string,
 *     SolutionStackName?: string,
 *     PlatformArn?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     OptionsToRemove?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result updateTagsForResource(array{
 *     ResourceArn?: string,
 *     TagsToAdd?: list<array{Key?: string, Value?: string, ...}>,
 *     TagsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTagsForResourceAsync(array{
 *     ResourceArn?: string,
 *     TagsToAdd?: list<array{Key?: string, Value?: string, ...}>,
 *     TagsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateConfigurationSettings(array $args = [])
 * @phpstan-method \Aws\Result validateConfigurationSettings(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     EnvironmentName?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validateConfigurationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateConfigurationSettingsAsync(array{
 *     ApplicationName?: string,
 *     TemplateName?: string,
 *     EnvironmentName?: string,
 *     OptionSettings?: list<array{ResourceName?: string, Namespace?: string, OptionName?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class ElasticBeanstalkClient extends AwsClient {}
