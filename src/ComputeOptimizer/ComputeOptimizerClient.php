<?php
namespace Aws\ComputeOptimizer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Compute Optimizer** service.
 * @method \Aws\Result deleteRecommendationPreferences(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommendationPreferences(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     recommendationPreferenceNames?: list<'EnhancedInfrastructureMetrics'|'ExternalMetricsPreference'|'InferredWorkloadTypes'|'LookBackPeriodPreference'|'PreferredResources'|'UtilizationPreferences'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommendationPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommendationPreferencesAsync(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     recommendationPreferenceNames?: list<'EnhancedInfrastructureMetrics'|'ExternalMetricsPreference'|'InferredWorkloadTypes'|'LookBackPeriodPreference'|'PreferredResources'|'UtilizationPreferences'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRecommendationExportJobs(array $args = [])
 * @phpstan-method \Aws\Result describeRecommendationExportJobs(array{
 *     jobIds?: list<string>,
 *     filters?: list<array{name?: 'JobStatus'|'ResourceType', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecommendationExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecommendationExportJobsAsync(array{
 *     jobIds?: list<string>,
 *     filters?: list<array{name?: 'JobStatus'|'ResourceType', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportAutoScalingGroupRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportAutoScalingGroupRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'AutoScalingGroupArn'|'AutoScalingGroupName'|'CurrentConfigurationAllocationStrategy'|'CurrentConfigurationDesiredCapacity'|'CurrentConfigurationInstanceType'|'CurrentConfigurationMaxSize'|'CurrentConfigurationMinSize'|'CurrentConfigurationMixedInstanceTypes'|'CurrentConfigurationType'|'CurrentInstanceGpuInfo'|'CurrentMemory'|'CurrentNetwork'|'CurrentOnDemandPrice'|'CurrentPerformanceRisk'|'CurrentStandardOneYearNoUpfrontReservedPrice'|'CurrentStandardThreeYearNoUpfrontReservedPrice'|'CurrentStorage'|'CurrentVCpus'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesInferredWorkloadTypes'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesPreferredResources'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'InferredWorkloadTypes'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsConfigurationAllocationStrategy'|'RecommendationOptionsConfigurationDesiredCapacity'|'RecommendationOptionsConfigurationEstimatedInstanceHourReductionPercentage'|'RecommendationOptionsConfigurationInstanceType'|'RecommendationOptionsConfigurationMaxSize'|'RecommendationOptionsConfigurationMinSize'|'RecommendationOptionsConfigurationMixedInstanceTypes'|'RecommendationOptionsConfigurationType'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsInstanceGpuInfo'|'RecommendationOptionsMemory'|'RecommendationOptionsMigrationEffort'|'RecommendationOptionsNetwork'|'RecommendationOptionsOnDemandPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuMemoryPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice'|'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice'|'RecommendationOptionsStorage'|'RecommendationOptionsVcpus'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDiskReadBytesPerSecondMaximum'|'UtilizationMetricsDiskReadOpsPerSecondMaximum'|'UtilizationMetricsDiskWriteBytesPerSecondMaximum'|'UtilizationMetricsDiskWriteOpsPerSecondMaximum'|'UtilizationMetricsEbsReadBytesPerSecondMaximum'|'UtilizationMetricsEbsReadOpsPerSecondMaximum'|'UtilizationMetricsEbsWriteBytesPerSecondMaximum'|'UtilizationMetricsEbsWriteOpsPerSecondMaximum'|'UtilizationMetricsGpuMemoryPercentageMaximum'|'UtilizationMetricsGpuPercentageMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNetworkPacketsInPerSecondMaximum'|'UtilizationMetricsNetworkPacketsOutPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportAutoScalingGroupRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportAutoScalingGroupRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'AutoScalingGroupArn'|'AutoScalingGroupName'|'CurrentConfigurationAllocationStrategy'|'CurrentConfigurationDesiredCapacity'|'CurrentConfigurationInstanceType'|'CurrentConfigurationMaxSize'|'CurrentConfigurationMinSize'|'CurrentConfigurationMixedInstanceTypes'|'CurrentConfigurationType'|'CurrentInstanceGpuInfo'|'CurrentMemory'|'CurrentNetwork'|'CurrentOnDemandPrice'|'CurrentPerformanceRisk'|'CurrentStandardOneYearNoUpfrontReservedPrice'|'CurrentStandardThreeYearNoUpfrontReservedPrice'|'CurrentStorage'|'CurrentVCpus'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesInferredWorkloadTypes'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesPreferredResources'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'InferredWorkloadTypes'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsConfigurationAllocationStrategy'|'RecommendationOptionsConfigurationDesiredCapacity'|'RecommendationOptionsConfigurationEstimatedInstanceHourReductionPercentage'|'RecommendationOptionsConfigurationInstanceType'|'RecommendationOptionsConfigurationMaxSize'|'RecommendationOptionsConfigurationMinSize'|'RecommendationOptionsConfigurationMixedInstanceTypes'|'RecommendationOptionsConfigurationType'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsInstanceGpuInfo'|'RecommendationOptionsMemory'|'RecommendationOptionsMigrationEffort'|'RecommendationOptionsNetwork'|'RecommendationOptionsOnDemandPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuMemoryPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice'|'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice'|'RecommendationOptionsStorage'|'RecommendationOptionsVcpus'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDiskReadBytesPerSecondMaximum'|'UtilizationMetricsDiskReadOpsPerSecondMaximum'|'UtilizationMetricsDiskWriteBytesPerSecondMaximum'|'UtilizationMetricsDiskWriteOpsPerSecondMaximum'|'UtilizationMetricsEbsReadBytesPerSecondMaximum'|'UtilizationMetricsEbsReadOpsPerSecondMaximum'|'UtilizationMetricsEbsWriteBytesPerSecondMaximum'|'UtilizationMetricsEbsWriteOpsPerSecondMaximum'|'UtilizationMetricsGpuMemoryPercentageMaximum'|'UtilizationMetricsGpuPercentageMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNetworkPacketsInPerSecondMaximum'|'UtilizationMetricsNetworkPacketsOutPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportEBSVolumeRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportEBSVolumeRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentConfigurationRootVolume'|'CurrentConfigurationVolumeBaselineIOPS'|'CurrentConfigurationVolumeBaselineThroughput'|'CurrentConfigurationVolumeBurstIOPS'|'CurrentConfigurationVolumeBurstThroughput'|'CurrentConfigurationVolumeSize'|'CurrentConfigurationVolumeType'|'CurrentMonthlyPrice'|'CurrentPerformanceRisk'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsConfigurationVolumeBaselineIOPS'|'RecommendationOptionsConfigurationVolumeBaselineThroughput'|'RecommendationOptionsConfigurationVolumeBurstIOPS'|'RecommendationOptionsConfigurationVolumeBurstThroughput'|'RecommendationOptionsConfigurationVolumeSize'|'RecommendationOptionsConfigurationVolumeType'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsMonthlyPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RootVolume'|'Tags'|'UtilizationMetricsVolumeIOPSExceededMaximum'|'UtilizationMetricsVolumeReadBytesPerSecondMaximum'|'UtilizationMetricsVolumeReadOpsPerSecondMaximum'|'UtilizationMetricsVolumeThroughputExceededMaximum'|'UtilizationMetricsVolumeWriteBytesPerSecondMaximum'|'UtilizationMetricsVolumeWriteOpsPerSecondMaximum'|'VolumeArn'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportEBSVolumeRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportEBSVolumeRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentConfigurationRootVolume'|'CurrentConfigurationVolumeBaselineIOPS'|'CurrentConfigurationVolumeBaselineThroughput'|'CurrentConfigurationVolumeBurstIOPS'|'CurrentConfigurationVolumeBurstThroughput'|'CurrentConfigurationVolumeSize'|'CurrentConfigurationVolumeType'|'CurrentMonthlyPrice'|'CurrentPerformanceRisk'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsConfigurationVolumeBaselineIOPS'|'RecommendationOptionsConfigurationVolumeBaselineThroughput'|'RecommendationOptionsConfigurationVolumeBurstIOPS'|'RecommendationOptionsConfigurationVolumeBurstThroughput'|'RecommendationOptionsConfigurationVolumeSize'|'RecommendationOptionsConfigurationVolumeType'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsMonthlyPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RootVolume'|'Tags'|'UtilizationMetricsVolumeIOPSExceededMaximum'|'UtilizationMetricsVolumeReadBytesPerSecondMaximum'|'UtilizationMetricsVolumeReadOpsPerSecondMaximum'|'UtilizationMetricsVolumeThroughputExceededMaximum'|'UtilizationMetricsVolumeWriteBytesPerSecondMaximum'|'UtilizationMetricsVolumeWriteOpsPerSecondMaximum'|'VolumeArn'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportEC2InstanceRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportEC2InstanceRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'CurrentInstanceGpuInfo'|'CurrentInstanceType'|'CurrentMemory'|'CurrentNetwork'|'CurrentOnDemandPrice'|'CurrentPerformanceRisk'|'CurrentStandardOneYearNoUpfrontReservedPrice'|'CurrentStandardThreeYearNoUpfrontReservedPrice'|'CurrentStorage'|'CurrentVCpus'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesExternalMetricsSource'|'EffectiveRecommendationPreferencesInferredWorkloadTypes'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesPreferredResources'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'EffectiveRecommendationPreferencesUtilizationPreferences'|'ExternalMetricStatusCode'|'ExternalMetricStatusReason'|'Finding'|'FindingReasonCodes'|'Idle'|'InferredWorkloadTypes'|'InstanceArn'|'InstanceName'|'InstanceState'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsInstanceGpuInfo'|'RecommendationOptionsInstanceType'|'RecommendationOptionsMemory'|'RecommendationOptionsMigrationEffort'|'RecommendationOptionsNetwork'|'RecommendationOptionsOnDemandPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsPlatformDifferences'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuMemoryPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice'|'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice'|'RecommendationOptionsStorage'|'RecommendationOptionsVcpus'|'RecommendationsSourcesRecommendationSourceArn'|'RecommendationsSourcesRecommendationSourceType'|'Tags'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDiskReadBytesPerSecondMaximum'|'UtilizationMetricsDiskReadOpsPerSecondMaximum'|'UtilizationMetricsDiskWriteBytesPerSecondMaximum'|'UtilizationMetricsDiskWriteOpsPerSecondMaximum'|'UtilizationMetricsEbsReadBytesPerSecondMaximum'|'UtilizationMetricsEbsReadOpsPerSecondMaximum'|'UtilizationMetricsEbsWriteBytesPerSecondMaximum'|'UtilizationMetricsEbsWriteOpsPerSecondMaximum'|'UtilizationMetricsGpuMemoryPercentageMaximum'|'UtilizationMetricsGpuPercentageMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNetworkPacketsInPerSecondMaximum'|'UtilizationMetricsNetworkPacketsOutPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportEC2InstanceRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportEC2InstanceRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'CurrentInstanceGpuInfo'|'CurrentInstanceType'|'CurrentMemory'|'CurrentNetwork'|'CurrentOnDemandPrice'|'CurrentPerformanceRisk'|'CurrentStandardOneYearNoUpfrontReservedPrice'|'CurrentStandardThreeYearNoUpfrontReservedPrice'|'CurrentStorage'|'CurrentVCpus'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesExternalMetricsSource'|'EffectiveRecommendationPreferencesInferredWorkloadTypes'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesPreferredResources'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'EffectiveRecommendationPreferencesUtilizationPreferences'|'ExternalMetricStatusCode'|'ExternalMetricStatusReason'|'Finding'|'FindingReasonCodes'|'Idle'|'InferredWorkloadTypes'|'InstanceArn'|'InstanceName'|'InstanceState'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsInstanceGpuInfo'|'RecommendationOptionsInstanceType'|'RecommendationOptionsMemory'|'RecommendationOptionsMigrationEffort'|'RecommendationOptionsNetwork'|'RecommendationOptionsOnDemandPrice'|'RecommendationOptionsPerformanceRisk'|'RecommendationOptionsPlatformDifferences'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuMemoryPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsGpuPercentageMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice'|'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice'|'RecommendationOptionsStorage'|'RecommendationOptionsVcpus'|'RecommendationsSourcesRecommendationSourceArn'|'RecommendationsSourcesRecommendationSourceType'|'Tags'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDiskReadBytesPerSecondMaximum'|'UtilizationMetricsDiskReadOpsPerSecondMaximum'|'UtilizationMetricsDiskWriteBytesPerSecondMaximum'|'UtilizationMetricsDiskWriteOpsPerSecondMaximum'|'UtilizationMetricsEbsReadBytesPerSecondMaximum'|'UtilizationMetricsEbsReadOpsPerSecondMaximum'|'UtilizationMetricsEbsWriteBytesPerSecondMaximum'|'UtilizationMetricsEbsWriteOpsPerSecondMaximum'|'UtilizationMetricsGpuMemoryPercentageMaximum'|'UtilizationMetricsGpuPercentageMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNetworkPacketsInPerSecondMaximum'|'UtilizationMetricsNetworkPacketsOutPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportECSServiceRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportECSServiceRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentPerformanceRisk'|'CurrentServiceConfigurationAutoScalingConfiguration'|'CurrentServiceConfigurationCpu'|'CurrentServiceConfigurationMemory'|'CurrentServiceConfigurationTaskDefinitionArn'|'CurrentServiceContainerConfigurations'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'FindingReasonCodes'|'LastRefreshTimestamp'|'LaunchType'|'LookbackPeriodInDays'|'RecommendationOptionsContainerRecommendations'|'RecommendationOptionsCpu'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsMemory'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'ServiceArn'|'Tags'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsMemoryMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportECSServiceRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportECSServiceRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentPerformanceRisk'|'CurrentServiceConfigurationAutoScalingConfiguration'|'CurrentServiceConfigurationCpu'|'CurrentServiceConfigurationMemory'|'CurrentServiceConfigurationTaskDefinitionArn'|'CurrentServiceContainerConfigurations'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'FindingReasonCodes'|'LastRefreshTimestamp'|'LaunchType'|'LookbackPeriodInDays'|'RecommendationOptionsContainerRecommendations'|'RecommendationOptionsCpu'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsMemory'|'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'ServiceArn'|'Tags'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsMemoryMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportIdleRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportIdleRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'ResourceType', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'Finding'|'FindingDescription'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'ResourceArn'|'ResourceId'|'ResourceType'|'SavingsOpportunity'|'SavingsOpportunityAfterDiscount'|'Tags'|'UtilizationMetricsActiveConnectionCountMaximum'|'UtilizationMetricsCacheHitsSum'|'UtilizationMetricsCacheMissesSum'|'UtilizationMetricsConsumedReadCapacityUnitsSum'|'UtilizationMetricsConsumedWriteCapacityUnitsSum'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsCurrConnectionsSum'|'UtilizationMetricsDatabaseConnectionsMaximum'|'UtilizationMetricsDatabaseConnectionsSum'|'UtilizationMetricsEBSVolumeReadIOPSMaximum'|'UtilizationMetricsEBSVolumeWriteIOPSMaximum'|'UtilizationMetricsElastiCacheProcessingUnitsSum'|'UtilizationMetricsEngineCPUUtilizationMaximum'|'UtilizationMetricsGetTypeCmdsSum'|'UtilizationMetricsInvocationsSum'|'UtilizationMetricsIsIdleMinimum'|'UtilizationMetricsKeyspaceHitsSum'|'UtilizationMetricsKeyspaceMissesSum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNewConnectionsSum'|'UtilizationMetricsPacketsInFromDestinationMaximum'|'UtilizationMetricsPacketsInFromSourceMaximum'|'UtilizationMetricsSetTypeCmdsSum'|'UtilizationMetricsUserConnectedSum'|'UtilizationMetricsVolumeReadOpsPerSecondMaximum'|'UtilizationMetricsVolumeWriteOpsPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportIdleRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportIdleRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'ResourceType', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'Finding'|'FindingDescription'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'ResourceArn'|'ResourceId'|'ResourceType'|'SavingsOpportunity'|'SavingsOpportunityAfterDiscount'|'Tags'|'UtilizationMetricsActiveConnectionCountMaximum'|'UtilizationMetricsCacheHitsSum'|'UtilizationMetricsCacheMissesSum'|'UtilizationMetricsConsumedReadCapacityUnitsSum'|'UtilizationMetricsConsumedWriteCapacityUnitsSum'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsCurrConnectionsSum'|'UtilizationMetricsDatabaseConnectionsMaximum'|'UtilizationMetricsDatabaseConnectionsSum'|'UtilizationMetricsEBSVolumeReadIOPSMaximum'|'UtilizationMetricsEBSVolumeWriteIOPSMaximum'|'UtilizationMetricsElastiCacheProcessingUnitsSum'|'UtilizationMetricsEngineCPUUtilizationMaximum'|'UtilizationMetricsGetTypeCmdsSum'|'UtilizationMetricsInvocationsSum'|'UtilizationMetricsIsIdleMinimum'|'UtilizationMetricsKeyspaceHitsSum'|'UtilizationMetricsKeyspaceMissesSum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkInBytesPerSecondMaximum'|'UtilizationMetricsNetworkOutBytesPerSecondMaximum'|'UtilizationMetricsNewConnectionsSum'|'UtilizationMetricsPacketsInFromDestinationMaximum'|'UtilizationMetricsPacketsInFromSourceMaximum'|'UtilizationMetricsSetTypeCmdsSum'|'UtilizationMetricsUserConnectedSum'|'UtilizationMetricsVolumeReadOpsPerSecondMaximum'|'UtilizationMetricsVolumeWriteOpsPerSecondMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportLambdaFunctionRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportLambdaFunctionRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentConfigurationMemorySize'|'CurrentConfigurationTimeout'|'CurrentCostAverage'|'CurrentCostTotal'|'CurrentPerformanceRisk'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'FindingReasonCodes'|'FunctionArn'|'FunctionVersion'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'NumberOfInvocations'|'RecommendationOptionsConfigurationMemorySize'|'RecommendationOptionsCostHigh'|'RecommendationOptionsCostLow'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsProjectedUtilizationMetricsDurationExpected'|'RecommendationOptionsProjectedUtilizationMetricsDurationLowerBound'|'RecommendationOptionsProjectedUtilizationMetricsDurationUpperBound'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'Tags'|'UtilizationMetricsDurationAverage'|'UtilizationMetricsDurationMaximum'|'UtilizationMetricsMemoryAverage'|'UtilizationMetricsMemoryMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportLambdaFunctionRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportLambdaFunctionRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentConfigurationMemorySize'|'CurrentConfigurationTimeout'|'CurrentCostAverage'|'CurrentCostTotal'|'CurrentPerformanceRisk'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Finding'|'FindingReasonCodes'|'FunctionArn'|'FunctionVersion'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'NumberOfInvocations'|'RecommendationOptionsConfigurationMemorySize'|'RecommendationOptionsCostHigh'|'RecommendationOptionsCostLow'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'RecommendationOptionsProjectedUtilizationMetricsDurationExpected'|'RecommendationOptionsProjectedUtilizationMetricsDurationLowerBound'|'RecommendationOptionsProjectedUtilizationMetricsDurationUpperBound'|'RecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'RecommendationOptionsSavingsOpportunityPercentage'|'Tags'|'UtilizationMetricsDurationAverage'|'UtilizationMetricsDurationMaximum'|'UtilizationMetricsMemoryAverage'|'UtilizationMetricsMemoryMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportLicenseRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportLicenseRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode'|'LicenseName', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentLicenseConfigurationInstanceType'|'CurrentLicenseConfigurationLicenseEdition'|'CurrentLicenseConfigurationLicenseModel'|'CurrentLicenseConfigurationLicenseName'|'CurrentLicenseConfigurationLicenseVersion'|'CurrentLicenseConfigurationMetricsSource'|'CurrentLicenseConfigurationNumberOfCores'|'CurrentLicenseConfigurationOperatingSystem'|'Finding'|'FindingReasonCodes'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsLicenseEdition'|'RecommendationOptionsLicenseModel'|'RecommendationOptionsOperatingSystem'|'RecommendationOptionsSavingsOpportunityPercentage'|'ResourceArn'|'Tags'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportLicenseRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportLicenseRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode'|'LicenseName', values?: list<string>, ...}>,
 *     fieldsToExport?: list<'AccountId'|'CurrentLicenseConfigurationInstanceType'|'CurrentLicenseConfigurationLicenseEdition'|'CurrentLicenseConfigurationLicenseModel'|'CurrentLicenseConfigurationLicenseName'|'CurrentLicenseConfigurationLicenseVersion'|'CurrentLicenseConfigurationMetricsSource'|'CurrentLicenseConfigurationNumberOfCores'|'CurrentLicenseConfigurationOperatingSystem'|'Finding'|'FindingReasonCodes'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'RecommendationOptionsEstimatedMonthlySavingsCurrency'|'RecommendationOptionsEstimatedMonthlySavingsValue'|'RecommendationOptionsLicenseEdition'|'RecommendationOptionsLicenseModel'|'RecommendationOptionsOperatingSystem'|'RecommendationOptionsSavingsOpportunityPercentage'|'ResourceArn'|'Tags'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportRDSDatabaseRecommendations(array $args = [])
 * @phpstan-method \Aws\Result exportRDSDatabaseRecommendations(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Idle'|'InstanceFinding'|'InstanceFindingReasonCode'|'StorageFinding'|'StorageFindingReasonCode',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'ClusterWriter'|'CurrentDBInstanceClass'|'CurrentInstanceOnDemandHourlyPrice'|'CurrentInstancePerformanceRisk'|'CurrentStorageConfigurationAllocatedStorage'|'CurrentStorageConfigurationIOPS'|'CurrentStorageConfigurationMaxAllocatedStorage'|'CurrentStorageConfigurationStorageThroughput'|'CurrentStorageConfigurationStorageType'|'CurrentStorageEstimatedClusterInstanceOnDemandMonthlyCost'|'CurrentStorageEstimatedClusterStorageIOOnDemandMonthlyCost'|'CurrentStorageEstimatedClusterStorageOnDemandMonthlyCost'|'CurrentStorageEstimatedMonthlyVolumeIOPsCostVariation'|'CurrentStorageOnDemandMonthlyPrice'|'DBClusterIdentifier'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Engine'|'EngineVersion'|'Idle'|'InstanceFinding'|'InstanceFindingReasonCodes'|'InstanceRecommendationOptionsDBInstanceClass'|'InstanceRecommendationOptionsEstimatedMonthlySavingsCurrency'|'InstanceRecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'InstanceRecommendationOptionsEstimatedMonthlySavingsValue'|'InstanceRecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'InstanceRecommendationOptionsInstanceOnDemandHourlyPrice'|'InstanceRecommendationOptionsPerformanceRisk'|'InstanceRecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'InstanceRecommendationOptionsRank'|'InstanceRecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'InstanceRecommendationOptionsSavingsOpportunityPercentage'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'MultiAZDBInstance'|'PromotionTier'|'ResourceArn'|'StorageFinding'|'StorageFindingReasonCodes'|'StorageRecommendationOptionsAllocatedStorage'|'StorageRecommendationOptionsEstimatedClusterInstanceOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedClusterStorageIOOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedClusterStorageOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedMonthlySavingsCurrency'|'StorageRecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'StorageRecommendationOptionsEstimatedMonthlySavingsValue'|'StorageRecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'StorageRecommendationOptionsEstimatedMonthlyVolumeIOPsCostVariation'|'StorageRecommendationOptionsIOPS'|'StorageRecommendationOptionsMaxAllocatedStorage'|'StorageRecommendationOptionsOnDemandMonthlyPrice'|'StorageRecommendationOptionsRank'|'StorageRecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'StorageRecommendationOptionsSavingsOpportunityPercentage'|'StorageRecommendationOptionsStorageThroughput'|'StorageRecommendationOptionsStorageType'|'Tags'|'UtilizationMetricsAuroraMemoryHealthStateMaximum'|'UtilizationMetricsAuroraMemoryNumDeclinedSqlTotalMaximum'|'UtilizationMetricsAuroraMemoryNumKillConnTotalMaximum'|'UtilizationMetricsAuroraMemoryNumKillQueryTotalMaximum'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDatabaseConnectionsMaximum'|'UtilizationMetricsEBSVolumeReadIOPSMaximum'|'UtilizationMetricsEBSVolumeReadThroughputMaximum'|'UtilizationMetricsEBSVolumeStorageSpaceUtilizationMaximum'|'UtilizationMetricsEBSVolumeWriteIOPSMaximum'|'UtilizationMetricsEBSVolumeWriteThroughputMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkReceiveThroughputMaximum'|'UtilizationMetricsNetworkTransmitThroughputMaximum'|'UtilizationMetricsReadIOPSEphemeralStorageMaximum'|'UtilizationMetricsStorageNetworkReceiveThroughputMaximum'|'UtilizationMetricsStorageNetworkTransmitThroughputMaximum'|'UtilizationMetricsVolumeBytesUsedAverage'|'UtilizationMetricsVolumeReadIOPsAverage'|'UtilizationMetricsVolumeWriteIOPsAverage'|'UtilizationMetricsWriteIOPSEphemeralStorageMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportRDSDatabaseRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportRDSDatabaseRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     filters?: list<array{
 *         name?: 'Idle'|'InstanceFinding'|'InstanceFindingReasonCode'|'StorageFinding'|'StorageFindingReasonCode',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     fieldsToExport?: list<'AccountId'|'ClusterWriter'|'CurrentDBInstanceClass'|'CurrentInstanceOnDemandHourlyPrice'|'CurrentInstancePerformanceRisk'|'CurrentStorageConfigurationAllocatedStorage'|'CurrentStorageConfigurationIOPS'|'CurrentStorageConfigurationMaxAllocatedStorage'|'CurrentStorageConfigurationStorageThroughput'|'CurrentStorageConfigurationStorageType'|'CurrentStorageEstimatedClusterInstanceOnDemandMonthlyCost'|'CurrentStorageEstimatedClusterStorageIOOnDemandMonthlyCost'|'CurrentStorageEstimatedClusterStorageOnDemandMonthlyCost'|'CurrentStorageEstimatedMonthlyVolumeIOPsCostVariation'|'CurrentStorageOnDemandMonthlyPrice'|'DBClusterIdentifier'|'EffectiveRecommendationPreferencesCpuVendorArchitectures'|'EffectiveRecommendationPreferencesEnhancedInfrastructureMetrics'|'EffectiveRecommendationPreferencesLookBackPeriod'|'EffectiveRecommendationPreferencesSavingsEstimationMode'|'Engine'|'EngineVersion'|'Idle'|'InstanceFinding'|'InstanceFindingReasonCodes'|'InstanceRecommendationOptionsDBInstanceClass'|'InstanceRecommendationOptionsEstimatedMonthlySavingsCurrency'|'InstanceRecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'InstanceRecommendationOptionsEstimatedMonthlySavingsValue'|'InstanceRecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'InstanceRecommendationOptionsInstanceOnDemandHourlyPrice'|'InstanceRecommendationOptionsPerformanceRisk'|'InstanceRecommendationOptionsProjectedUtilizationMetricsCpuMaximum'|'InstanceRecommendationOptionsRank'|'InstanceRecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'InstanceRecommendationOptionsSavingsOpportunityPercentage'|'LastRefreshTimestamp'|'LookbackPeriodInDays'|'MultiAZDBInstance'|'PromotionTier'|'ResourceArn'|'StorageFinding'|'StorageFindingReasonCodes'|'StorageRecommendationOptionsAllocatedStorage'|'StorageRecommendationOptionsEstimatedClusterInstanceOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedClusterStorageIOOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedClusterStorageOnDemandMonthlyCost'|'StorageRecommendationOptionsEstimatedMonthlySavingsCurrency'|'StorageRecommendationOptionsEstimatedMonthlySavingsCurrencyAfterDiscounts'|'StorageRecommendationOptionsEstimatedMonthlySavingsValue'|'StorageRecommendationOptionsEstimatedMonthlySavingsValueAfterDiscounts'|'StorageRecommendationOptionsEstimatedMonthlyVolumeIOPsCostVariation'|'StorageRecommendationOptionsIOPS'|'StorageRecommendationOptionsMaxAllocatedStorage'|'StorageRecommendationOptionsOnDemandMonthlyPrice'|'StorageRecommendationOptionsRank'|'StorageRecommendationOptionsSavingsOpportunityAfterDiscountsPercentage'|'StorageRecommendationOptionsSavingsOpportunityPercentage'|'StorageRecommendationOptionsStorageThroughput'|'StorageRecommendationOptionsStorageType'|'Tags'|'UtilizationMetricsAuroraMemoryHealthStateMaximum'|'UtilizationMetricsAuroraMemoryNumDeclinedSqlTotalMaximum'|'UtilizationMetricsAuroraMemoryNumKillConnTotalMaximum'|'UtilizationMetricsAuroraMemoryNumKillQueryTotalMaximum'|'UtilizationMetricsCpuMaximum'|'UtilizationMetricsDatabaseConnectionsMaximum'|'UtilizationMetricsEBSVolumeReadIOPSMaximum'|'UtilizationMetricsEBSVolumeReadThroughputMaximum'|'UtilizationMetricsEBSVolumeStorageSpaceUtilizationMaximum'|'UtilizationMetricsEBSVolumeWriteIOPSMaximum'|'UtilizationMetricsEBSVolumeWriteThroughputMaximum'|'UtilizationMetricsMemoryMaximum'|'UtilizationMetricsNetworkReceiveThroughputMaximum'|'UtilizationMetricsNetworkTransmitThroughputMaximum'|'UtilizationMetricsReadIOPSEphemeralStorageMaximum'|'UtilizationMetricsStorageNetworkReceiveThroughputMaximum'|'UtilizationMetricsStorageNetworkTransmitThroughputMaximum'|'UtilizationMetricsVolumeBytesUsedAverage'|'UtilizationMetricsVolumeReadIOPsAverage'|'UtilizationMetricsVolumeWriteIOPsAverage'|'UtilizationMetricsWriteIOPSEphemeralStorageMaximum'>,
 *     s3DestinationConfig?: array{bucket?: string, keyPrefix?: string, ...},
 *     fileFormat?: 'Csv',
 *     includeMemberAccounts?: bool,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAutoScalingGroupRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getAutoScalingGroupRecommendations(array{
 *     accountIds?: list<string>,
 *     autoScalingGroupArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoScalingGroupRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoScalingGroupRecommendationsAsync(array{
 *     accountIds?: list<string>,
 *     autoScalingGroupArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEBSVolumeRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getEBSVolumeRecommendations(array{
 *     volumeArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEBSVolumeRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEBSVolumeRecommendationsAsync(array{
 *     volumeArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEC2InstanceRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getEC2InstanceRecommendations(array{
 *     instanceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     accountIds?: list<string>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEC2InstanceRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEC2InstanceRecommendationsAsync(array{
 *     instanceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Finding'|'FindingReasonCodes'|'InferredWorkloadTypes'|'RecommendationSourceType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     accountIds?: list<string>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEC2RecommendationProjectedMetrics(array $args = [])
 * @phpstan-method \Aws\Result getEC2RecommendationProjectedMetrics(array{
 *     instanceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEC2RecommendationProjectedMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEC2RecommendationProjectedMetricsAsync(array{
 *     instanceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getECSServiceRecommendationProjectedMetrics(array $args = [])
 * @phpstan-method \Aws\Result getECSServiceRecommendationProjectedMetrics(array{
 *     serviceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getECSServiceRecommendationProjectedMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getECSServiceRecommendationProjectedMetricsAsync(array{
 *     serviceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getECSServiceRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getECSServiceRecommendations(array{
 *     serviceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getECSServiceRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getECSServiceRecommendationsAsync(array{
 *     serviceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEffectiveRecommendationPreferences(array $args = [])
 * @phpstan-method \Aws\Result getEffectiveRecommendationPreferences(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEffectiveRecommendationPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEffectiveRecommendationPreferencesAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getEnrollmentStatus(array $args = [])
 * @phpstan-method \Aws\Result getEnrollmentStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnrollmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnrollmentStatusAsync(array{...} $args = [])
 * @method \Aws\Result getEnrollmentStatusesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getEnrollmentStatusesForOrganization(array{
 *     filters?: list<array{name?: 'Status', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnrollmentStatusesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnrollmentStatusesForOrganizationAsync(array{
 *     filters?: list<array{name?: 'Status', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getIdleRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getIdleRecommendations(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'ResourceType', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     orderBy?: array{dimension?: 'SavingsValue'|'SavingsValueAfterDiscount', order?: 'Asc'|'Desc', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdleRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdleRecommendationsAsync(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'ResourceType', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     orderBy?: array{dimension?: 'SavingsValue'|'SavingsValueAfterDiscount', order?: 'Asc'|'Desc', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLambdaFunctionRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getLambdaFunctionRecommendations(array{
 *     functionArns?: list<string>,
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLambdaFunctionRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLambdaFunctionRecommendationsAsync(array{
 *     functionArns?: list<string>,
 *     accountIds?: list<string>,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLicenseRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getLicenseRecommendations(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode'|'LicenseName', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseRecommendationsAsync(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: 'Finding'|'FindingReasonCode'|'LicenseName', values?: list<string>, ...}>,
 *     accountIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRDSDatabaseRecommendationProjectedMetrics(array $args = [])
 * @phpstan-method \Aws\Result getRDSDatabaseRecommendationProjectedMetrics(array{
 *     resourceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationProjectedMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationProjectedMetricsAsync(array{
 *     resourceArn?: string,
 *     stat?: 'Average'|'Maximum',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRDSDatabaseRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRDSDatabaseRecommendations(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Idle'|'InstanceFinding'|'InstanceFindingReasonCode'|'StorageFinding'|'StorageFindingReasonCode',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     accountIds?: list<string>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationsAsync(array{
 *     resourceArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: 'Idle'|'InstanceFinding'|'InstanceFindingReasonCode'|'StorageFinding'|'StorageFindingReasonCode',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     accountIds?: list<string>,
 *     recommendationPreferences?: array{cpuVendorArchitectures?: list<'AWS_ARM64'|'CURRENT'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecommendationPreferences(array $args = [])
 * @phpstan-method \Aws\Result getRecommendationPreferences(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationPreferencesAsync(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecommendationSummaries(array $args = [])
 * @phpstan-method \Aws\Result getRecommendationSummaries(array{accountIds?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationSummariesAsync(array{accountIds?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putRecommendationPreferences(array $args = [])
 * @phpstan-method \Aws\Result putRecommendationPreferences(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     enhancedInfrastructureMetrics?: 'Active'|'Inactive',
 *     inferredWorkloadTypes?: 'Active'|'Inactive',
 *     externalMetricsPreference?: array{source?: 'Datadog'|'Dynatrace'|'Instana'|'NewRelic', ...},
 *     lookBackPeriod?: 'DAYS_14'|'DAYS_32'|'DAYS_93',
 *     utilizationPreferences?: list<array{metricName?: 'CpuUtilization'|'MemoryUtilization', metricParameters?: array, ...}>,
 *     preferredResources?: list<array{name?: 'Ec2InstanceTypes', includeList?: list<string>, excludeList?: list<string>, ...}>,
 *     savingsEstimationMode?: 'AfterDiscounts'|'BeforeDiscounts',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRecommendationPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRecommendationPreferencesAsync(array{
 *     resourceType?: 'AuroraDBClusterStorage'|'AutoScalingGroup'|'EbsVolume'|'Ec2Instance'|'EcsService'|'Idle'|'LambdaFunction'|'License'|'NotApplicable'|'RdsDBInstance',
 *     scope?: array{name?: 'AccountId'|'Organization'|'ResourceArn', value?: string, ...},
 *     enhancedInfrastructureMetrics?: 'Active'|'Inactive',
 *     inferredWorkloadTypes?: 'Active'|'Inactive',
 *     externalMetricsPreference?: array{source?: 'Datadog'|'Dynatrace'|'Instana'|'NewRelic', ...},
 *     lookBackPeriod?: 'DAYS_14'|'DAYS_32'|'DAYS_93',
 *     utilizationPreferences?: list<array{metricName?: 'CpuUtilization'|'MemoryUtilization', metricParameters?: array, ...}>,
 *     preferredResources?: list<array{name?: 'Ec2InstanceTypes', includeList?: list<string>, excludeList?: list<string>, ...}>,
 *     savingsEstimationMode?: 'AfterDiscounts'|'BeforeDiscounts',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnrollmentStatus(array $args = [])
 * @phpstan-method \Aws\Result updateEnrollmentStatus(array{status?: 'Active'|'Failed'|'Inactive'|'Pending', includeMemberAccounts?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array{status?: 'Active'|'Failed'|'Inactive'|'Pending', includeMemberAccounts?: bool, ...} $args = [])
 */
class ComputeOptimizerClient extends AwsClient {}
