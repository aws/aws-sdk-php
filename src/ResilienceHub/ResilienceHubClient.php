<?php
namespace Aws\ResilienceHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resilience Hub** service.
 * @method \Aws\Result acceptResourceGroupingRecommendations(array $args = [])
 * @phpstan-method \Aws\Result acceptResourceGroupingRecommendations(array{appArn?: string, entries?: list<array{groupingRecommendationId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptResourceGroupingRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptResourceGroupingRecommendationsAsync(array{appArn?: string, entries?: list<array{groupingRecommendationId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result addDraftAppVersionResourceMappings(array $args = [])
 * @phpstan-method \Aws\Result addDraftAppVersionResourceMappings(array{
 *     appArn?: string,
 *     resourceMappings?: list<array{
 *         appRegistryAppName?: string,
 *         eksSourceName?: string,
 *         logicalStackName?: string,
 *         mappingType?: 'AppRegistryApp'|'CfnStack'|'EKS'|'Resource'|'ResourceGroup'|'Terraform',
 *         physicalResourceId?: array,
 *         resourceGroupName?: string,
 *         resourceName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addDraftAppVersionResourceMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addDraftAppVersionResourceMappingsAsync(array{
 *     appArn?: string,
 *     resourceMappings?: list<array{
 *         appRegistryAppName?: string,
 *         eksSourceName?: string,
 *         logicalStackName?: string,
 *         mappingType?: 'AppRegistryApp'|'CfnStack'|'EKS'|'Resource'|'ResourceGroup'|'Terraform',
 *         physicalResourceId?: array,
 *         resourceGroupName?: string,
 *         resourceName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateRecommendationStatus(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateRecommendationStatus(array{
 *     appArn?: string,
 *     requestEntries?: list<array{
 *         appComponentId?: string,
 *         entryId?: string,
 *         excludeReason?: 'AlreadyImplemented'|'ComplexityOfImplementation'|'NotRelevant',
 *         excluded?: bool,
 *         item?: array,
 *         referenceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateRecommendationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateRecommendationStatusAsync(array{
 *     appArn?: string,
 *     requestEntries?: list<array{
 *         appComponentId?: string,
 *         entryId?: string,
 *         excludeReason?: 'AlreadyImplemented'|'ComplexityOfImplementation'|'NotRelevant',
 *         excluded?: bool,
 *         item?: array,
 *         referenceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApp(array $args = [])
 * @phpstan-method \Aws\Result createApp(array{
 *     assessmentSchedule?: 'Daily'|'Disabled',
 *     awsApplicationArn?: string,
 *     clientToken?: string,
 *     description?: string,
 *     eventSubscriptions?: list<array{eventType?: 'DriftDetected'|'ScheduledAssessmentFailure', name?: string, snsTopicArn?: string, ...}>,
 *     name?: string,
 *     permissionModel?: array{crossAccountRoleArns?: list<string>, invokerRoleName?: string, type?: 'LegacyIAMUser'|'RoleBased', ...},
 *     policyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppAsync(array{
 *     assessmentSchedule?: 'Daily'|'Disabled',
 *     awsApplicationArn?: string,
 *     clientToken?: string,
 *     description?: string,
 *     eventSubscriptions?: list<array{eventType?: 'DriftDetected'|'ScheduledAssessmentFailure', name?: string, snsTopicArn?: string, ...}>,
 *     name?: string,
 *     permissionModel?: array{crossAccountRoleArns?: list<string>, invokerRoleName?: string, type?: 'LegacyIAMUser'|'RoleBased', ...},
 *     policyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppVersionAppComponent(array $args = [])
 * @phpstan-method \Aws\Result createAppVersionAppComponent(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     clientToken?: string,
 *     id?: string,
 *     name?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppVersionAppComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppVersionAppComponentAsync(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     clientToken?: string,
 *     id?: string,
 *     name?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppVersionResource(array $args = [])
 * @phpstan-method \Aws\Result createAppVersionResource(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     appComponents?: list<string>,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     clientToken?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     resourceType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppVersionResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppVersionResourceAsync(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     appComponents?: list<string>,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     clientToken?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     resourceType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecommendationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createRecommendationTemplate(array{
 *     assessmentArn?: string,
 *     bucketName?: string,
 *     clientToken?: string,
 *     format?: 'CfnJson'|'CfnYaml',
 *     name?: string,
 *     recommendationIds?: list<string>,
 *     recommendationTypes?: list<'Alarm'|'Sop'|'Test'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecommendationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommendationTemplateAsync(array{
 *     assessmentArn?: string,
 *     bucketName?: string,
 *     clientToken?: string,
 *     format?: 'CfnJson'|'CfnYaml',
 *     name?: string,
 *     recommendationIds?: list<string>,
 *     recommendationTypes?: list<'Alarm'|'Sop'|'Test'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResiliencyPolicy(array $args = [])
 * @phpstan-method \Aws\Result createResiliencyPolicy(array{
 *     clientToken?: string,
 *     dataLocationConstraint?: 'AnyLocation'|'SameContinent'|'SameCountry',
 *     policy?: array<string, array{rpoInSecs?: int, rtoInSecs?: int, ...}>,
 *     policyDescription?: string,
 *     policyName?: string,
 *     tags?: array<string, string>,
 *     tier?: 'CoreServices'|'Critical'|'Important'|'MissionCritical'|'NonCritical'|'NotApplicable',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResiliencyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResiliencyPolicyAsync(array{
 *     clientToken?: string,
 *     dataLocationConstraint?: 'AnyLocation'|'SameContinent'|'SameCountry',
 *     policy?: array<string, array{rpoInSecs?: int, rtoInSecs?: int, ...}>,
 *     policyDescription?: string,
 *     policyName?: string,
 *     tags?: array<string, string>,
 *     tier?: 'CoreServices'|'Critical'|'Important'|'MissionCritical'|'NonCritical'|'NotApplicable',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApp(array $args = [])
 * @phpstan-method \Aws\Result deleteApp(array{appArn?: string, clientToken?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAsync(array{appArn?: string, clientToken?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteAppAssessment(array $args = [])
 * @phpstan-method \Aws\Result deleteAppAssessment(array{assessmentArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAssessmentAsync(array{assessmentArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteAppInputSource(array $args = [])
 * @phpstan-method \Aws\Result deleteAppInputSource(array{
 *     appArn?: string,
 *     clientToken?: string,
 *     eksSourceClusterNamespace?: array{eksClusterArn?: string, namespace?: string, ...},
 *     sourceArn?: string,
 *     terraformSource?: array{s3StateFileUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInputSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppInputSourceAsync(array{
 *     appArn?: string,
 *     clientToken?: string,
 *     eksSourceClusterNamespace?: array{eksClusterArn?: string, namespace?: string, ...},
 *     sourceArn?: string,
 *     terraformSource?: array{s3StateFileUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAppVersionAppComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteAppVersionAppComponent(array{appArn?: string, clientToken?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppVersionAppComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppVersionAppComponentAsync(array{appArn?: string, clientToken?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteAppVersionResource(array $args = [])
 * @phpstan-method \Aws\Result deleteAppVersionResource(array{
 *     appArn?: string,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     clientToken?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppVersionResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppVersionResourceAsync(array{
 *     appArn?: string,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     clientToken?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRecommendationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommendationTemplate(array{clientToken?: string, recommendationTemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommendationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommendationTemplateAsync(array{clientToken?: string, recommendationTemplateArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResiliencyPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResiliencyPolicy(array{clientToken?: string, policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResiliencyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResiliencyPolicyAsync(array{clientToken?: string, policyArn?: string, ...} $args = [])
 * @method \Aws\Result describeApp(array $args = [])
 * @phpstan-method \Aws\Result describeApp(array{appArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppAsync(array{appArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppAssessment(array $args = [])
 * @phpstan-method \Aws\Result describeAppAssessment(array{assessmentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppAssessmentAsync(array{assessmentArn?: string, ...} $args = [])
 * @method \Aws\Result describeAppVersion(array $args = [])
 * @phpstan-method \Aws\Result describeAppVersion(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppVersionAsync(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \Aws\Result describeAppVersionAppComponent(array $args = [])
 * @phpstan-method \Aws\Result describeAppVersionAppComponent(array{appArn?: string, appVersion?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppVersionAppComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppVersionAppComponentAsync(array{appArn?: string, appVersion?: string, id?: string, ...} $args = [])
 * @method \Aws\Result describeAppVersionResource(array $args = [])
 * @phpstan-method \Aws\Result describeAppVersionResource(array{
 *     appArn?: string,
 *     appVersion?: string,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppVersionResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppVersionResourceAsync(array{
 *     appArn?: string,
 *     appVersion?: string,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAppVersionResourcesResolutionStatus(array $args = [])
 * @phpstan-method \Aws\Result describeAppVersionResourcesResolutionStatus(array{appArn?: string, appVersion?: string, resolutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppVersionResourcesResolutionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppVersionResourcesResolutionStatusAsync(array{appArn?: string, appVersion?: string, resolutionId?: string, ...} $args = [])
 * @method \Aws\Result describeAppVersionTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeAppVersionTemplate(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppVersionTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppVersionTemplateAsync(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \Aws\Result describeDraftAppVersionResourcesImportStatus(array $args = [])
 * @phpstan-method \Aws\Result describeDraftAppVersionResourcesImportStatus(array{appArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDraftAppVersionResourcesImportStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDraftAppVersionResourcesImportStatusAsync(array{appArn?: string, ...} $args = [])
 * @method \Aws\Result describeMetricsExport(array $args = [])
 * @phpstan-method \Aws\Result describeMetricsExport(array{metricsExportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetricsExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetricsExportAsync(array{metricsExportId?: string, ...} $args = [])
 * @method \Aws\Result describeResiliencyPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResiliencyPolicy(array{policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResiliencyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResiliencyPolicyAsync(array{policyArn?: string, ...} $args = [])
 * @method \Aws\Result describeResourceGroupingRecommendationTask(array $args = [])
 * @phpstan-method \Aws\Result describeResourceGroupingRecommendationTask(array{appArn?: string, groupingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceGroupingRecommendationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceGroupingRecommendationTaskAsync(array{appArn?: string, groupingId?: string, ...} $args = [])
 * @method \Aws\Result importResourcesToDraftAppVersion(array $args = [])
 * @phpstan-method \Aws\Result importResourcesToDraftAppVersion(array{
 *     appArn?: string,
 *     eksSources?: list<array{eksClusterArn?: string, namespaces?: list<string>, ...}>,
 *     importStrategy?: 'AddOnly'|'ReplaceAll',
 *     sourceArns?: list<string>,
 *     terraformSources?: list<array{s3StateFileUrl?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importResourcesToDraftAppVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importResourcesToDraftAppVersionAsync(array{
 *     appArn?: string,
 *     eksSources?: list<array{eksClusterArn?: string, namespaces?: list<string>, ...}>,
 *     importStrategy?: 'AddOnly'|'ReplaceAll',
 *     sourceArns?: list<string>,
 *     terraformSources?: list<array{s3StateFileUrl?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAlarmRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listAlarmRecommendations(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlarmRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlarmRecommendationsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppAssessmentComplianceDrifts(array $args = [])
 * @phpstan-method \Aws\Result listAppAssessmentComplianceDrifts(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppAssessmentComplianceDriftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppAssessmentComplianceDriftsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppAssessmentResourceDrifts(array $args = [])
 * @phpstan-method \Aws\Result listAppAssessmentResourceDrifts(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppAssessmentResourceDriftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppAssessmentResourceDriftsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppAssessments(array $args = [])
 * @phpstan-method \Aws\Result listAppAssessments(array{
 *     appArn?: string,
 *     assessmentName?: string,
 *     assessmentStatus?: list<'Failed'|'InProgress'|'Pending'|'Success'>,
 *     complianceStatus?: 'MissingPolicy'|'NotApplicable'|'PolicyBreached'|'PolicyMet',
 *     invoker?: 'System'|'User',
 *     maxResults?: int,
 *     nextToken?: string,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppAssessmentsAsync(array{
 *     appArn?: string,
 *     assessmentName?: string,
 *     assessmentStatus?: list<'Failed'|'InProgress'|'Pending'|'Success'>,
 *     complianceStatus?: 'MissingPolicy'|'NotApplicable'|'PolicyBreached'|'PolicyMet',
 *     invoker?: 'System'|'User',
 *     maxResults?: int,
 *     nextToken?: string,
 *     reverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAppComponentCompliances(array $args = [])
 * @phpstan-method \Aws\Result listAppComponentCompliances(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppComponentCompliancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppComponentCompliancesAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppComponentRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listAppComponentRecommendations(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppComponentRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppComponentRecommendationsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppInputSources(array $args = [])
 * @phpstan-method \Aws\Result listAppInputSources(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInputSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppInputSourcesAsync(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppVersionAppComponents(array $args = [])
 * @phpstan-method \Aws\Result listAppVersionAppComponents(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppVersionAppComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppVersionAppComponentsAsync(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppVersionResourceMappings(array $args = [])
 * @phpstan-method \Aws\Result listAppVersionResourceMappings(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppVersionResourceMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppVersionResourceMappingsAsync(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppVersionResources(array $args = [])
 * @phpstan-method \Aws\Result listAppVersionResources(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, resolutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppVersionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppVersionResourcesAsync(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, resolutionId?: string, ...} $args = [])
 * @method \Aws\Result listAppVersions(array $args = [])
 * @phpstan-method \Aws\Result listAppVersions(array{
 *     appArn?: string,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppVersionsAsync(array{
 *     appArn?: string,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApps(array $args = [])
 * @phpstan-method \Aws\Result listApps(array{
 *     appArn?: string,
 *     awsApplicationArn?: string,
 *     fromLastAssessmentTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     name?: string,
 *     nextToken?: string,
 *     reverseOrder?: bool,
 *     toLastAssessmentTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppsAsync(array{
 *     appArn?: string,
 *     awsApplicationArn?: string,
 *     fromLastAssessmentTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     name?: string,
 *     nextToken?: string,
 *     reverseOrder?: bool,
 *     toLastAssessmentTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMetrics(array $args = [])
 * @phpstan-method \Aws\Result listMetrics(array{
 *     conditions?: list<array{
 *         field?: string,
 *         operator?: 'Equals'|'GreaterOrEquals'|'GreaterThen'|'LessOrEquals'|'LessThen'|'NotEquals',
 *         value?: string,
 *         ...,
 *     }>,
 *     dataSource?: string,
 *     fields?: list<array{aggregation?: 'Avg'|'Count'|'Max'|'Min'|'Sum', name?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sorts?: list<array{ascending?: bool, field?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricsAsync(array{
 *     conditions?: list<array{
 *         field?: string,
 *         operator?: 'Equals'|'GreaterOrEquals'|'GreaterThen'|'LessOrEquals'|'LessThen'|'NotEquals',
 *         value?: string,
 *         ...,
 *     }>,
 *     dataSource?: string,
 *     fields?: list<array{aggregation?: 'Avg'|'Count'|'Max'|'Min'|'Sum', name?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sorts?: list<array{ascending?: bool, field?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendationTemplates(array $args = [])
 * @phpstan-method \Aws\Result listRecommendationTemplates(array{
 *     assessmentArn?: string,
 *     maxResults?: int,
 *     name?: string,
 *     nextToken?: string,
 *     recommendationTemplateArn?: string,
 *     reverseOrder?: bool,
 *     status?: list<'Failed'|'InProgress'|'Pending'|'Success'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationTemplatesAsync(array{
 *     assessmentArn?: string,
 *     maxResults?: int,
 *     name?: string,
 *     nextToken?: string,
 *     recommendationTemplateArn?: string,
 *     reverseOrder?: bool,
 *     status?: list<'Failed'|'InProgress'|'Pending'|'Success'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResiliencyPolicies(array $args = [])
 * @phpstan-method \Aws\Result listResiliencyPolicies(array{maxResults?: int, nextToken?: string, policyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResiliencyPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResiliencyPoliciesAsync(array{maxResults?: int, nextToken?: string, policyName?: string, ...} $args = [])
 * @method \Aws\Result listResourceGroupingRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listResourceGroupingRecommendations(array{appArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceGroupingRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceGroupingRecommendationsAsync(array{appArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSopRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listSopRecommendations(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSopRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSopRecommendationsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSuggestedResiliencyPolicies(array $args = [])
 * @phpstan-method \Aws\Result listSuggestedResiliencyPolicies(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuggestedResiliencyPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSuggestedResiliencyPoliciesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTestRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listTestRecommendations(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestRecommendationsAsync(array{assessmentArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listUnsupportedAppVersionResources(array $args = [])
 * @phpstan-method \Aws\Result listUnsupportedAppVersionResources(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, resolutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUnsupportedAppVersionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUnsupportedAppVersionResourcesAsync(array{appArn?: string, appVersion?: string, maxResults?: int, nextToken?: string, resolutionId?: string, ...} $args = [])
 * @method \Aws\Result publishAppVersion(array $args = [])
 * @phpstan-method \Aws\Result publishAppVersion(array{appArn?: string, versionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishAppVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishAppVersionAsync(array{appArn?: string, versionName?: string, ...} $args = [])
 * @method \Aws\Result putDraftAppVersionTemplate(array $args = [])
 * @phpstan-method \Aws\Result putDraftAppVersionTemplate(array{appArn?: string, appTemplateBody?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDraftAppVersionTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDraftAppVersionTemplateAsync(array{appArn?: string, appTemplateBody?: string, ...} $args = [])
 * @method \Aws\Result rejectResourceGroupingRecommendations(array $args = [])
 * @phpstan-method \Aws\Result rejectResourceGroupingRecommendations(array{
 *     appArn?: string,
 *     entries?: list<array{
 *         groupingRecommendationId?: string,
 *         rejectionReason?: 'DistinctBusinessPurpose'|'DistinctUserGroupHandling'|'Other'|'SeparateDataConcern',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectResourceGroupingRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectResourceGroupingRecommendationsAsync(array{
 *     appArn?: string,
 *     entries?: list<array{
 *         groupingRecommendationId?: string,
 *         rejectionReason?: 'DistinctBusinessPurpose'|'DistinctUserGroupHandling'|'Other'|'SeparateDataConcern',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeDraftAppVersionResourceMappings(array $args = [])
 * @phpstan-method \Aws\Result removeDraftAppVersionResourceMappings(array{
 *     appArn?: string,
 *     appRegistryAppNames?: list<string>,
 *     eksSourceNames?: list<string>,
 *     logicalStackNames?: list<string>,
 *     resourceGroupNames?: list<string>,
 *     resourceNames?: list<string>,
 *     terraformSourceNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeDraftAppVersionResourceMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeDraftAppVersionResourceMappingsAsync(array{
 *     appArn?: string,
 *     appRegistryAppNames?: list<string>,
 *     eksSourceNames?: list<string>,
 *     logicalStackNames?: list<string>,
 *     resourceGroupNames?: list<string>,
 *     resourceNames?: list<string>,
 *     terraformSourceNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resolveAppVersionResources(array $args = [])
 * @phpstan-method \Aws\Result resolveAppVersionResources(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveAppVersionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resolveAppVersionResourcesAsync(array{appArn?: string, appVersion?: string, ...} $args = [])
 * @method \Aws\Result startAppAssessment(array $args = [])
 * @phpstan-method \Aws\Result startAppAssessment(array{
 *     appArn?: string,
 *     appVersion?: string,
 *     assessmentName?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAppAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAppAssessmentAsync(array{
 *     appArn?: string,
 *     appVersion?: string,
 *     assessmentName?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMetricsExport(array $args = [])
 * @phpstan-method \Aws\Result startMetricsExport(array{bucketName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetricsExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetricsExportAsync(array{bucketName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result startResourceGroupingRecommendationTask(array $args = [])
 * @phpstan-method \Aws\Result startResourceGroupingRecommendationTask(array{appArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startResourceGroupingRecommendationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startResourceGroupingRecommendationTaskAsync(array{appArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApp(array $args = [])
 * @phpstan-method \Aws\Result updateApp(array{
 *     appArn?: string,
 *     assessmentSchedule?: 'Daily'|'Disabled',
 *     clearResiliencyPolicyArn?: bool,
 *     description?: string,
 *     eventSubscriptions?: list<array{eventType?: 'DriftDetected'|'ScheduledAssessmentFailure', name?: string, snsTopicArn?: string, ...}>,
 *     permissionModel?: array{crossAccountRoleArns?: list<string>, invokerRoleName?: string, type?: 'LegacyIAMUser'|'RoleBased', ...},
 *     policyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppAsync(array{
 *     appArn?: string,
 *     assessmentSchedule?: 'Daily'|'Disabled',
 *     clearResiliencyPolicyArn?: bool,
 *     description?: string,
 *     eventSubscriptions?: list<array{eventType?: 'DriftDetected'|'ScheduledAssessmentFailure', name?: string, snsTopicArn?: string, ...}>,
 *     permissionModel?: array{crossAccountRoleArns?: list<string>, invokerRoleName?: string, type?: 'LegacyIAMUser'|'RoleBased', ...},
 *     policyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAppVersion(array $args = [])
 * @phpstan-method \Aws\Result updateAppVersion(array{additionalInfo?: array<string, list<string>>, appArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppVersionAsync(array{additionalInfo?: array<string, list<string>>, appArn?: string, ...} $args = [])
 * @method \Aws\Result updateAppVersionAppComponent(array $args = [])
 * @phpstan-method \Aws\Result updateAppVersionAppComponent(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     id?: string,
 *     name?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppVersionAppComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppVersionAppComponentAsync(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     id?: string,
 *     name?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAppVersionResource(array $args = [])
 * @phpstan-method \Aws\Result updateAppVersionResource(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     appComponents?: list<string>,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     excluded?: bool,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     resourceType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppVersionResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppVersionResourceAsync(array{
 *     additionalInfo?: array<string, list<string>>,
 *     appArn?: string,
 *     appComponents?: list<string>,
 *     awsAccountId?: string,
 *     awsRegion?: string,
 *     excluded?: bool,
 *     logicalResourceId?: array{
 *         eksSourceName?: string,
 *         identifier?: string,
 *         logicalStackName?: string,
 *         resourceGroupName?: string,
 *         terraformSourceName?: string,
 *         ...,
 *     },
 *     physicalResourceId?: string,
 *     resourceName?: string,
 *     resourceType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResiliencyPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateResiliencyPolicy(array{
 *     dataLocationConstraint?: 'AnyLocation'|'SameContinent'|'SameCountry',
 *     policy?: array<string, array{rpoInSecs?: int, rtoInSecs?: int, ...}>,
 *     policyArn?: string,
 *     policyDescription?: string,
 *     policyName?: string,
 *     tier?: 'CoreServices'|'Critical'|'Important'|'MissionCritical'|'NonCritical'|'NotApplicable',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResiliencyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResiliencyPolicyAsync(array{
 *     dataLocationConstraint?: 'AnyLocation'|'SameContinent'|'SameCountry',
 *     policy?: array<string, array{rpoInSecs?: int, rtoInSecs?: int, ...}>,
 *     policyArn?: string,
 *     policyDescription?: string,
 *     policyName?: string,
 *     tier?: 'CoreServices'|'Critical'|'Important'|'MissionCritical'|'NonCritical'|'NotApplicable',
 *     ...,
 * } $args = [])
 */
class ResilienceHubClient extends AwsClient {}
