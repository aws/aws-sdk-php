<?php
namespace Aws\EMRContainers;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EMR Containers** service.
 * @method \Aws\Result cancelJobRun(array $args = [])
 * @phpstan-method \Aws\Result cancelJobRun(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobRunAsync(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \Aws\Result createJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result createJobTemplate(array{
 *     name?: string,
 *     clientToken?: string,
 *     jobTemplateData?: array{
 *         executionRoleArn?: string,
 *         releaseLabel?: string,
 *         configurationOverrides?: array{applicationConfiguration?: list<array>, monitoringConfiguration?: array, ...},
 *         jobDriver?: array{sparkSubmitJobDriver?: array, sparkSqlJobDriver?: array, ...},
 *         parameterConfiguration?: array<string, array>,
 *         jobTags?: array<string, string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array{
 *     name?: string,
 *     clientToken?: string,
 *     jobTemplateData?: array{
 *         executionRoleArn?: string,
 *         releaseLabel?: string,
 *         configurationOverrides?: array{applicationConfiguration?: list<array>, monitoringConfiguration?: array, ...},
 *         jobDriver?: array{sparkSubmitJobDriver?: array, sparkSqlJobDriver?: array, ...},
 *         parameterConfiguration?: array<string, array>,
 *         jobTags?: array<string, string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createManagedEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createManagedEndpoint(array{
 *     name?: string,
 *     virtualClusterId?: string,
 *     type?: string,
 *     releaseLabel?: string,
 *     executionRoleArn?: string,
 *     certificateArn?: string,
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             managedLogs?: array,
 *             persistentAppUI?: 'DISABLED'|'ENABLED',
 *             cloudWatchMonitoringConfiguration?: array,
 *             s3MonitoringConfiguration?: array,
 *             containerLogRotationConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     sessionIdleTimeoutInMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createManagedEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createManagedEndpointAsync(array{
 *     name?: string,
 *     virtualClusterId?: string,
 *     type?: string,
 *     releaseLabel?: string,
 *     executionRoleArn?: string,
 *     certificateArn?: string,
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             managedLogs?: array,
 *             persistentAppUI?: 'DISABLED'|'ENABLED',
 *             cloudWatchMonitoringConfiguration?: array,
 *             s3MonitoringConfiguration?: array,
 *             containerLogRotationConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     sessionIdleTimeoutInMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSecurityConfiguration(array{
 *     clientToken?: string,
 *     name?: string,
 *     containerProvider?: array{type?: 'EKS', id?: string, info?: array{eksInfo?: array, ...}, ...},
 *     securityConfigurationData?: array{
 *         authorizationConfiguration?: array{lakeFormationConfiguration?: array, encryptionConfiguration?: array, ...},
 *         authenticationConfiguration?: array{identityCenterConfiguration?: array, iamConfiguration?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     containerProvider?: array{type?: 'EKS', id?: string, info?: array{eksInfo?: array, ...}, ...},
 *     securityConfigurationData?: array{
 *         authorizationConfiguration?: array{lakeFormationConfiguration?: array, encryptionConfiguration?: array, ...},
 *         authenticationConfiguration?: array{identityCenterConfiguration?: array, iamConfiguration?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualCluster(array $args = [])
 * @phpstan-method \Aws\Result createVirtualCluster(array{
 *     name?: string,
 *     containerProvider?: array{type?: 'EKS', id?: string, info?: array{eksInfo?: array, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     securityConfigurationId?: string,
 *     sessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualClusterAsync(array{
 *     name?: string,
 *     containerProvider?: array{type?: 'EKS', id?: string, info?: array{eksInfo?: array, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     securityConfigurationId?: string,
 *     sessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteJobTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteManagedEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteManagedEndpoint(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteManagedEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteManagedEndpointAsync(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityConfiguration(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteVirtualCluster(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualClusterAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeJobRun(array $args = [])
 * @phpstan-method \Aws\Result describeJobRun(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobRunAsync(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \Aws\Result describeJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeJobTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeManagedEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeManagedEndpoint(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedEndpointAsync(array{id?: string, virtualClusterId?: string, ...} $args = [])
 * @method \Aws\Result describeSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityConfiguration(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeVirtualCluster(array $args = [])
 * @phpstan-method \Aws\Result describeVirtualCluster(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualClusterAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getManagedEndpointSessionCredentials(array $args = [])
 * @phpstan-method \Aws\Result getManagedEndpointSessionCredentials(array{
 *     endpointIdentifier?: string,
 *     virtualClusterIdentifier?: string,
 *     executionRoleArn?: string,
 *     credentialType?: string,
 *     durationInSeconds?: int,
 *     logContext?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedEndpointSessionCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedEndpointSessionCredentialsAsync(array{
 *     endpointIdentifier?: string,
 *     virtualClusterIdentifier?: string,
 *     executionRoleArn?: string,
 *     credentialType?: string,
 *     durationInSeconds?: int,
 *     logContext?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobRuns(array $args = [])
 * @phpstan-method \Aws\Result listJobRuns(array{
 *     virtualClusterId?: string,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     name?: string,
 *     states?: list<'CANCELLED'|'CANCEL_PENDING'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'SUBMITTED'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobRunsAsync(array{
 *     virtualClusterId?: string,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     name?: string,
 *     states?: list<'CANCELLED'|'CANCEL_PENDING'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'SUBMITTED'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobTemplates(array $args = [])
 * @phpstan-method \Aws\Result listJobTemplates(array{
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array{
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listManagedEndpoints(array{
 *     virtualClusterId?: string,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     types?: list<string>,
 *     states?: list<'ACTIVE'|'CREATING'|'TERMINATED'|'TERMINATED_WITH_ERRORS'|'TERMINATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedEndpointsAsync(array{
 *     virtualClusterId?: string,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     types?: list<string>,
 *     states?: list<'ACTIVE'|'CREATING'|'TERMINATED'|'TERMINATED_WITH_ERRORS'|'TERMINATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSecurityConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSecurityConfigurations(array{
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array{
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVirtualClusters(array $args = [])
 * @phpstan-method \Aws\Result listVirtualClusters(array{
 *     containerProviderId?: string,
 *     containerProviderType?: 'EKS',
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     states?: list<'ARRESTED'|'RUNNING'|'TERMINATED'|'TERMINATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     eksAccessEntryIntegrated?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualClustersAsync(array{
 *     containerProviderId?: string,
 *     containerProviderType?: 'EKS',
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     states?: list<'ARRESTED'|'RUNNING'|'TERMINATED'|'TERMINATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     eksAccessEntryIntegrated?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJobRun(array $args = [])
 * @phpstan-method \Aws\Result startJobRun(array{
 *     name?: string,
 *     virtualClusterId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     releaseLabel?: string,
 *     jobDriver?: array{
 *         sparkSubmitJobDriver?: array{entryPoint?: string, entryPointArguments?: list<string>, sparkSubmitParameters?: string, ...},
 *         sparkSqlJobDriver?: array{entryPoint?: string, sparkSqlParameters?: string, ...},
 *         ...,
 *     },
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             managedLogs?: array,
 *             persistentAppUI?: 'DISABLED'|'ENABLED',
 *             cloudWatchMonitoringConfiguration?: array,
 *             s3MonitoringConfiguration?: array,
 *             containerLogRotationConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     jobTemplateId?: string,
 *     jobTemplateParameters?: array<string, string>,
 *     retryPolicyConfiguration?: array{maxAttempts?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobRunAsync(array{
 *     name?: string,
 *     virtualClusterId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     releaseLabel?: string,
 *     jobDriver?: array{
 *         sparkSubmitJobDriver?: array{entryPoint?: string, entryPointArguments?: list<string>, sparkSubmitParameters?: string, ...},
 *         sparkSqlJobDriver?: array{entryPoint?: string, sparkSqlParameters?: string, ...},
 *         ...,
 *     },
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             managedLogs?: array,
 *             persistentAppUI?: 'DISABLED'|'ENABLED',
 *             cloudWatchMonitoringConfiguration?: array,
 *             s3MonitoringConfiguration?: array,
 *             containerLogRotationConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     jobTemplateId?: string,
 *     jobTemplateParameters?: array<string, string>,
 *     retryPolicyConfiguration?: array{maxAttempts?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class EMRContainersClient extends AwsClient {}
