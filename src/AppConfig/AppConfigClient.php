<?php
namespace Aws\AppConfig;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon AppConfig** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{Name?: string, Description?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{Name?: string, Description?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createConfigurationProfile(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationProfile(array{
 *     ApplicationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     LocationUri?: string,
 *     RetrievalRoleArn?: string,
 *     Validators?: list<array{Type?: 'JSON_SCHEMA'|'LAMBDA', Content?: string, ...}>,
 *     Tags?: array<string, string>,
 *     Type?: string,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationProfileAsync(array{
 *     ApplicationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     LocationUri?: string,
 *     RetrievalRoleArn?: string,
 *     Validators?: list<array{Type?: 'JSON_SCHEMA'|'LAMBDA', Content?: string, ...}>,
 *     Tags?: array<string, string>,
 *     Type?: string,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeploymentStrategy(array $args = [])
 * @phpstan-method \Aws\Result createDeploymentStrategy(array{
 *     Name?: string,
 *     Description?: string,
 *     DeploymentDurationInMinutes?: int,
 *     FinalBakeTimeInMinutes?: int,
 *     GrowthFactor?: float,
 *     GrowthType?: 'EXPONENTIAL'|'LINEAR',
 *     ReplicateTo?: 'NONE'|'SSM_DOCUMENT',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentStrategyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentStrategyAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DeploymentDurationInMinutes?: int,
 *     FinalBakeTimeInMinutes?: int,
 *     GrowthFactor?: float,
 *     GrowthType?: 'EXPONENTIAL'|'LINEAR',
 *     ReplicateTo?: 'NONE'|'SSM_DOCUMENT',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     ApplicationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Monitors?: list<array{AlarmArn?: string, AlarmRoleArn?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     ApplicationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Monitors?: list<array{AlarmArn?: string, AlarmRoleArn?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExperimentDefinition(array $args = [])
 * @phpstan-method \Aws\Result createExperimentDefinition(array{
 *     ApplicationIdentifier?: string,
 *     Name?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     FlagKey?: string,
 *     Treatments?: list<array{Weight?: float, Description?: string, FlagValue?: array, ...}>,
 *     Control?: array{
 *         Weight?: float,
 *         Description?: string,
 *         FlagValue?: array{Enabled?: bool, AttributeValues?: array<string, array>, ...},
 *         ...,
 *     },
 *     AudienceRule?: string,
 *     Hypothesis?: string,
 *     AudienceDescription?: string,
 *     LaunchCriteria?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExperimentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExperimentDefinitionAsync(array{
 *     ApplicationIdentifier?: string,
 *     Name?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     FlagKey?: string,
 *     Treatments?: list<array{Weight?: float, Description?: string, FlagValue?: array, ...}>,
 *     Control?: array{
 *         Weight?: float,
 *         Description?: string,
 *         FlagValue?: array{Enabled?: bool, AttributeValues?: array<string, array>, ...},
 *         ...,
 *     },
 *     AudienceRule?: string,
 *     Hypothesis?: string,
 *     AudienceDescription?: string,
 *     LaunchCriteria?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExtension(array $args = [])
 * @phpstan-method \Aws\Result createExtension(array{
 *     Name?: string,
 *     Description?: string,
 *     Actions?: array<string, list<array>>,
 *     Parameters?: array<string, array{Description?: string, Required?: bool, Dynamic?: bool, ...}>,
 *     Tags?: array<string, string>,
 *     LatestVersionNumber?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExtensionAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Actions?: array<string, list<array>>,
 *     Parameters?: array<string, array{Description?: string, Required?: bool, Dynamic?: bool, ...}>,
 *     Tags?: array<string, string>,
 *     LatestVersionNumber?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExtensionAssociation(array $args = [])
 * @phpstan-method \Aws\Result createExtensionAssociation(array{
 *     ExtensionIdentifier?: string,
 *     ExtensionVersionNumber?: int,
 *     ResourceIdentifier?: string,
 *     Parameters?: array<string, string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExtensionAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExtensionAssociationAsync(array{
 *     ExtensionIdentifier?: string,
 *     ExtensionVersionNumber?: int,
 *     ResourceIdentifier?: string,
 *     Parameters?: array<string, string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHostedConfigurationVersion(array $args = [])
 * @phpstan-method \Aws\Result createHostedConfigurationVersion(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     Description?: string,
 *     Content?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     LatestVersionNumber?: int,
 *     VersionLabel?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHostedConfigurationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHostedConfigurationVersionAsync(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     Description?: string,
 *     Content?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     LatestVersionNumber?: int,
 *     VersionLabel?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationProfile(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     DeletionProtectionCheck?: 'ACCOUNT_DEFAULT'|'APPLY'|'BYPASS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationProfileAsync(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     DeletionProtectionCheck?: 'ACCOUNT_DEFAULT'|'APPLY'|'BYPASS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDeploymentStrategy(array $args = [])
 * @phpstan-method \Aws\Result deleteDeploymentStrategy(array{DeploymentStrategyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentStrategyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentStrategyAsync(array{DeploymentStrategyId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{
 *     EnvironmentId?: string,
 *     ApplicationId?: string,
 *     DeletionProtectionCheck?: 'ACCOUNT_DEFAULT'|'APPLY'|'BYPASS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{
 *     EnvironmentId?: string,
 *     ApplicationId?: string,
 *     DeletionProtectionCheck?: 'ACCOUNT_DEFAULT'|'APPLY'|'BYPASS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteExperimentDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteExperimentDefinition(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     DeleteType?: 'ARCHIVE'|'DESTROY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExperimentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExperimentDefinitionAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     DeleteType?: 'ARCHIVE'|'DESTROY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteExtension(array $args = [])
 * @phpstan-method \Aws\Result deleteExtension(array{ExtensionIdentifier?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExtensionAsync(array{ExtensionIdentifier?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteExtensionAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteExtensionAssociation(array{ExtensionAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExtensionAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExtensionAssociationAsync(array{ExtensionAssociationId?: string, ...} $args = [])
 * @method \Aws\Result deleteHostedConfigurationVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteHostedConfigurationVersion(array{ApplicationId?: string, ConfigurationProfileId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHostedConfigurationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHostedConfigurationVersionAsync(array{ApplicationId?: string, ConfigurationProfileId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConfiguration(array{
 *     Application?: string,
 *     Environment?: string,
 *     Configuration?: string,
 *     ClientId?: string,
 *     ClientConfigurationVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationAsync(array{
 *     Application?: string,
 *     Environment?: string,
 *     Configuration?: string,
 *     ClientId?: string,
 *     ClientConfigurationVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getConfigurationProfile(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationProfile(array{ApplicationId?: string, ConfigurationProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationProfileAsync(array{ApplicationId?: string, ConfigurationProfileId?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{ApplicationId?: string, EnvironmentId?: string, DeploymentNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{ApplicationId?: string, EnvironmentId?: string, DeploymentNumber?: int, ...} $args = [])
 * @method \Aws\Result getDeploymentStrategy(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentStrategy(array{DeploymentStrategyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentStrategyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentStrategyAsync(array{DeploymentStrategyId?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{ApplicationId?: string, EnvironmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{ApplicationId?: string, EnvironmentId?: string, ...} $args = [])
 * @method \Aws\Result getExperimentDefinition(array $args = [])
 * @phpstan-method \Aws\Result getExperimentDefinition(array{ApplicationIdentifier?: string, ExperimentDefinitionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExperimentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExperimentDefinitionAsync(array{ApplicationIdentifier?: string, ExperimentDefinitionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getExperimentRun(array $args = [])
 * @phpstan-method \Aws\Result getExperimentRun(array{ApplicationIdentifier?: string, ExperimentDefinitionIdentifier?: string, Run?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExperimentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExperimentRunAsync(array{ApplicationIdentifier?: string, ExperimentDefinitionIdentifier?: string, Run?: int, ...} $args = [])
 * @method \Aws\Result getExtension(array $args = [])
 * @phpstan-method \Aws\Result getExtension(array{ExtensionIdentifier?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExtensionAsync(array{ExtensionIdentifier?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result getExtensionAssociation(array $args = [])
 * @phpstan-method \Aws\Result getExtensionAssociation(array{ExtensionAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExtensionAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExtensionAssociationAsync(array{ExtensionAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getHostedConfigurationVersion(array $args = [])
 * @phpstan-method \Aws\Result getHostedConfigurationVersion(array{ApplicationId?: string, ConfigurationProfileId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedConfigurationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostedConfigurationVersionAsync(array{ApplicationId?: string, ConfigurationProfileId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationProfiles(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationProfiles(array{ApplicationId?: string, MaxResults?: int, NextToken?: string, Type?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationProfilesAsync(array{ApplicationId?: string, MaxResults?: int, NextToken?: string, Type?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentStrategies(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentStrategies(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentStrategiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentStrategiesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{ApplicationId?: string, EnvironmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{ApplicationId?: string, EnvironmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{ApplicationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{ApplicationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listExperimentDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listExperimentDefinitions(array{
 *     ApplicationIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     Status?: 'ACTIVE'|'ARCHIVED'|'IDLE',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentDefinitionsAsync(array{
 *     ApplicationIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     Status?: 'ACTIVE'|'ARCHIVED'|'IDLE',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExperimentRunEvents(array $args = [])
 * @phpstan-method \Aws\Result listExperimentRunEvents(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentRunEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentRunEventsAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExperimentRuns(array $args = [])
 * @phpstan-method \Aws\Result listExperimentRuns(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Status?: 'DONE'|'RUNNING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentRunsAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Status?: 'DONE'|'RUNNING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExtensionAssociations(array $args = [])
 * @phpstan-method \Aws\Result listExtensionAssociations(array{
 *     ResourceIdentifier?: string,
 *     ExtensionIdentifier?: string,
 *     ExtensionVersionNumber?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExtensionAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExtensionAssociationsAsync(array{
 *     ResourceIdentifier?: string,
 *     ExtensionIdentifier?: string,
 *     ExtensionVersionNumber?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExtensions(array $args = [])
 * @phpstan-method \Aws\Result listExtensions(array{MaxResults?: int, NextToken?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExtensionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExtensionsAsync(array{MaxResults?: int, NextToken?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result listHostedConfigurationVersions(array $args = [])
 * @phpstan-method \Aws\Result listHostedConfigurationVersions(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     VersionLabel?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedConfigurationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostedConfigurationVersionsAsync(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     VersionLabel?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startDeployment(array $args = [])
 * @phpstan-method \Aws\Result startDeployment(array{
 *     ApplicationId?: string,
 *     EnvironmentId?: string,
 *     DeploymentStrategyId?: string,
 *     ConfigurationProfileId?: string,
 *     ConfigurationVersion?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     KmsKeyIdentifier?: string,
 *     DynamicExtensionParameters?: array<string, string>,
 *     LatestDeploymentNumber?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeploymentAsync(array{
 *     ApplicationId?: string,
 *     EnvironmentId?: string,
 *     DeploymentStrategyId?: string,
 *     ConfigurationProfileId?: string,
 *     ConfigurationVersion?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     KmsKeyIdentifier?: string,
 *     DynamicExtensionParameters?: array<string, string>,
 *     LatestDeploymentNumber?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExperimentRun(array $args = [])
 * @phpstan-method \Aws\Result startExperimentRun(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Description?: string,
 *     ExposurePercentage?: float,
 *     TreatmentOverrides?: array{Inline?: array<string, string>, ...},
 *     Tags?: array<string, string>,
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExperimentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExperimentRunAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Description?: string,
 *     ExposurePercentage?: float,
 *     TreatmentOverrides?: array{Inline?: array<string, string>, ...},
 *     Tags?: array<string, string>,
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopDeployment(array $args = [])
 * @phpstan-method \Aws\Result stopDeployment(array{ApplicationId?: string, EnvironmentId?: string, DeploymentNumber?: int, AllowRevert?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDeploymentAsync(array{ApplicationId?: string, EnvironmentId?: string, DeploymentNumber?: int, AllowRevert?: bool, ...} $args = [])
 * @method \Aws\Result stopExperimentRun(array $args = [])
 * @phpstan-method \Aws\Result stopExperimentRun(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     Result?: array{ExecutiveSummary?: string, ReasonsToLaunch?: string, ReasonsNotToLaunch?: string, ...},
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopExperimentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopExperimentRunAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     Result?: array{ExecutiveSummary?: string, ReasonsToLaunch?: string, ReasonsNotToLaunch?: string, ...},
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
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
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{
 *     DeletionProtection?: array{Enabled?: bool, ProtectionPeriodInMinutes?: int, ...},
 *     VendedMetrics?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{
 *     DeletionProtection?: array{Enabled?: bool, ProtectionPeriodInMinutes?: int, ...},
 *     VendedMetrics?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{ApplicationId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{ApplicationId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateConfigurationProfile(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationProfile(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RetrievalRoleArn?: string,
 *     Validators?: list<array{Type?: 'JSON_SCHEMA'|'LAMBDA', Content?: string, ...}>,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationProfileAsync(array{
 *     ApplicationId?: string,
 *     ConfigurationProfileId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RetrievalRoleArn?: string,
 *     Validators?: list<array{Type?: 'JSON_SCHEMA'|'LAMBDA', Content?: string, ...}>,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeploymentStrategy(array $args = [])
 * @phpstan-method \Aws\Result updateDeploymentStrategy(array{
 *     DeploymentStrategyId?: string,
 *     Description?: string,
 *     DeploymentDurationInMinutes?: int,
 *     FinalBakeTimeInMinutes?: int,
 *     GrowthFactor?: float,
 *     GrowthType?: 'EXPONENTIAL'|'LINEAR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentStrategyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentStrategyAsync(array{
 *     DeploymentStrategyId?: string,
 *     Description?: string,
 *     DeploymentDurationInMinutes?: int,
 *     FinalBakeTimeInMinutes?: int,
 *     GrowthFactor?: float,
 *     GrowthType?: 'EXPONENTIAL'|'LINEAR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     ApplicationId?: string,
 *     EnvironmentId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Monitors?: list<array{AlarmArn?: string, AlarmRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     ApplicationId?: string,
 *     EnvironmentId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Monitors?: list<array{AlarmArn?: string, AlarmRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExperimentDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateExperimentDefinition(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Treatments?: list<array{Weight?: float, Description?: string, FlagValue?: array, ...}>,
 *     Control?: array{
 *         Weight?: float,
 *         Description?: string,
 *         FlagValue?: array{Enabled?: bool, AttributeValues?: array<string, array>, ...},
 *         ...,
 *     },
 *     Hypothesis?: string,
 *     AudienceRule?: string,
 *     AudienceDescription?: string,
 *     LaunchCriteria?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExperimentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExperimentDefinitionAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Treatments?: list<array{Weight?: float, Description?: string, FlagValue?: array, ...}>,
 *     Control?: array{
 *         Weight?: float,
 *         Description?: string,
 *         FlagValue?: array{Enabled?: bool, AttributeValues?: array<string, array>, ...},
 *         ...,
 *     },
 *     Hypothesis?: string,
 *     AudienceRule?: string,
 *     AudienceDescription?: string,
 *     LaunchCriteria?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExperimentRun(array $args = [])
 * @phpstan-method \Aws\Result updateExperimentRun(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     Description?: string,
 *     ExposurePercentage?: float,
 *     TreatmentOverrides?: array{Inline?: array<string, string>, ...},
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExperimentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExperimentRunAsync(array{
 *     ApplicationIdentifier?: string,
 *     ExperimentDefinitionIdentifier?: string,
 *     Run?: int,
 *     Description?: string,
 *     ExposurePercentage?: float,
 *     TreatmentOverrides?: array{Inline?: array<string, string>, ...},
 *     DeploymentParameters?: array{DynamicExtensionParameters?: array<string, string>, Tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExtension(array $args = [])
 * @phpstan-method \Aws\Result updateExtension(array{
 *     ExtensionIdentifier?: string,
 *     Description?: string,
 *     Actions?: array<string, list<array>>,
 *     Parameters?: array<string, array{Description?: string, Required?: bool, Dynamic?: bool, ...}>,
 *     VersionNumber?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExtensionAsync(array{
 *     ExtensionIdentifier?: string,
 *     Description?: string,
 *     Actions?: array<string, list<array>>,
 *     Parameters?: array<string, array{Description?: string, Required?: bool, Dynamic?: bool, ...}>,
 *     VersionNumber?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExtensionAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateExtensionAssociation(array{ExtensionAssociationId?: string, Parameters?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExtensionAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExtensionAssociationAsync(array{ExtensionAssociationId?: string, Parameters?: array<string, string>, ...} $args = [])
 * @method \Aws\Result validateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result validateConfiguration(array{ApplicationId?: string, ConfigurationProfileId?: string, ConfigurationVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateConfigurationAsync(array{ApplicationId?: string, ConfigurationProfileId?: string, ConfigurationVersion?: string, ...} $args = [])
 */
class AppConfigClient extends AwsClient {}
