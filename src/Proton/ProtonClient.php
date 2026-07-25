<?php
namespace Aws\Proton;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Proton** service.
 * @method \Aws\Result acceptEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result acceptEnvironmentAccountConnection(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptEnvironmentAccountConnectionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result cancelComponentDeployment(array $args = [])
 * @phpstan-method \Aws\Result cancelComponentDeployment(array{componentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelComponentDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelComponentDeploymentAsync(array{componentName?: string, ...} $args = [])
 * @method \Aws\Result cancelEnvironmentDeployment(array $args = [])
 * @phpstan-method \Aws\Result cancelEnvironmentDeployment(array{environmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelEnvironmentDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelEnvironmentDeploymentAsync(array{environmentName?: string, ...} $args = [])
 * @method \Aws\Result cancelServiceInstanceDeployment(array $args = [])
 * @phpstan-method \Aws\Result cancelServiceInstanceDeployment(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelServiceInstanceDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelServiceInstanceDeploymentAsync(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result cancelServicePipelineDeployment(array $args = [])
 * @phpstan-method \Aws\Result cancelServicePipelineDeployment(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelServicePipelineDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelServicePipelineDeploymentAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @phpstan-method \Aws\Result createComponent(array{
 *     clientToken?: string,
 *     description?: string,
 *     environmentName?: string,
 *     manifest?: string,
 *     name?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     serviceSpec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateFile?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     environmentName?: string,
 *     manifest?: string,
 *     name?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     serviceSpec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateFile?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     description?: string,
 *     environmentAccountConnectionId?: string,
 *     name?: string,
 *     protonServiceRoleArn?: string,
 *     provisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     description?: string,
 *     environmentAccountConnectionId?: string,
 *     name?: string,
 *     protonServiceRoleArn?: string,
 *     provisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentAccountConnection(array{
 *     clientToken?: string,
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     environmentName?: string,
 *     managementAccountId?: string,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAccountConnectionAsync(array{
 *     clientToken?: string,
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     environmentName?: string,
 *     managementAccountId?: string,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentTemplate(array{
 *     description?: string,
 *     displayName?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     provisioning?: 'CUSTOMER_MANAGED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentTemplateAsync(array{
 *     description?: string,
 *     displayName?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     provisioning?: 'CUSTOMER_MANAGED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentTemplateVersion(array{
 *     clientToken?: string,
 *     description?: string,
 *     majorVersion?: string,
 *     source?: array{s3?: array{bucket?: string, key?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentTemplateVersionAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     majorVersion?: string,
 *     source?: array{s3?: array{bucket?: string, key?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRepository(array $args = [])
 * @phpstan-method \Aws\Result createRepository(array{
 *     connectionArn?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryAsync(array{
 *     connectionArn?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     branchName?: string,
 *     description?: string,
 *     name?: string,
 *     repositoryConnectionArn?: string,
 *     repositoryId?: string,
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     branchName?: string,
 *     description?: string,
 *     name?: string,
 *     repositoryConnectionArn?: string,
 *     repositoryId?: string,
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceInstance(array $args = [])
 * @phpstan-method \Aws\Result createServiceInstance(array{
 *     clientToken?: string,
 *     name?: string,
 *     serviceName?: string,
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceInstanceAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     serviceName?: string,
 *     spec?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result createServiceSyncConfig(array{
 *     branch?: string,
 *     filePath?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceSyncConfigAsync(array{
 *     branch?: string,
 *     filePath?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result createServiceTemplate(array{
 *     description?: string,
 *     displayName?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     pipelineProvisioning?: 'CUSTOMER_MANAGED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceTemplateAsync(array{
 *     description?: string,
 *     displayName?: string,
 *     encryptionKey?: string,
 *     name?: string,
 *     pipelineProvisioning?: 'CUSTOMER_MANAGED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result createServiceTemplateVersion(array{
 *     clientToken?: string,
 *     compatibleEnvironmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     description?: string,
 *     majorVersion?: string,
 *     source?: array{s3?: array{bucket?: string, key?: string, ...}, ...},
 *     supportedComponentSources?: list<'DIRECTLY_DEFINED'>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceTemplateVersionAsync(array{
 *     clientToken?: string,
 *     compatibleEnvironmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     description?: string,
 *     majorVersion?: string,
 *     source?: array{s3?: array{bucket?: string, key?: string, ...}, ...},
 *     supportedComponentSources?: list<'DIRECTLY_DEFINED'>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplateSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result createTemplateSyncConfig(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     subdirectory?: string,
 *     templateName?: string,
 *     templateType?: 'ENVIRONMENT'|'SERVICE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateSyncConfigAsync(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     subdirectory?: string,
 *     templateName?: string,
 *     templateType?: 'ENVIRONMENT'|'SERVICE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteComponent(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentAccountConnection(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAccountConnectionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentTemplate(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentTemplateVersion(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateVersionAsync(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result deleteRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteRepository(array{name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array{name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceSyncConfig(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceSyncConfigAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceTemplate(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceTemplateAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceTemplateVersion(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceTemplateVersionAsync(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplateSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplateSyncConfig(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateSyncConfigAsync(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getComponent(array $args = [])
 * @phpstan-method \Aws\Result getComponent(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{
 *     componentName?: string,
 *     environmentName?: string,
 *     id?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{
 *     componentName?: string,
 *     environmentName?: string,
 *     id?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentAccountConnection(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAccountConnectionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentTemplate(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentTemplateAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentTemplateVersion(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentTemplateVersionAsync(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result getRepository(array $args = [])
 * @phpstan-method \Aws\Result getRepository(array{name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryAsync(array{name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...} $args = [])
 * @method \Aws\Result getRepositorySyncStatus(array $args = [])
 * @phpstan-method \Aws\Result getRepositorySyncStatus(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     syncType?: 'SERVICE_SYNC'|'TEMPLATE_SYNC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     syncType?: 'SERVICE_SYNC'|'TEMPLATE_SYNC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcesSummary(array $args = [])
 * @phpstan-method \Aws\Result getResourcesSummary(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesSummaryAsync(array{...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getServiceInstance(array $args = [])
 * @phpstan-method \Aws\Result getServiceInstance(array{name?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceInstanceAsync(array{name?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result getServiceInstanceSyncStatus(array $args = [])
 * @phpstan-method \Aws\Result getServiceInstanceSyncStatus(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceInstanceSyncStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceInstanceSyncStatusAsync(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result getServiceSyncBlockerSummary(array $args = [])
 * @phpstan-method \Aws\Result getServiceSyncBlockerSummary(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSyncBlockerSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSyncBlockerSummaryAsync(array{serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result getServiceSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result getServiceSyncConfig(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSyncConfigAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result getServiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result getServiceTemplate(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceTemplateAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getServiceTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result getServiceTemplateVersion(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceTemplateVersionAsync(array{majorVersion?: string, minorVersion?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result getTemplateSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result getTemplateSyncConfig(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateSyncConfigAsync(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', ...} $args = [])
 * @method \Aws\Result getTemplateSyncStatus(array $args = [])
 * @phpstan-method \Aws\Result getTemplateSyncStatus(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', templateVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSyncStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateSyncStatusAsync(array{templateName?: string, templateType?: 'ENVIRONMENT'|'SERVICE', templateVersion?: string, ...} $args = [])
 * @method \Aws\Result listComponentOutputs(array $args = [])
 * @phpstan-method \Aws\Result listComponentOutputs(array{componentName?: string, deploymentId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentOutputsAsync(array{componentName?: string, deploymentId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComponentProvisionedResources(array $args = [])
 * @phpstan-method \Aws\Result listComponentProvisionedResources(array{componentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentProvisionedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentProvisionedResourcesAsync(array{componentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{
 *     componentName?: string,
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{
 *     componentName?: string,
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnvironmentAccountConnections(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentAccountConnections(array{
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     requestedBy?: 'ENVIRONMENT_ACCOUNT'|'MANAGEMENT_ACCOUNT',
 *     statuses?: list<'CONNECTED'|'PENDING'|'REJECTED'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentAccountConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentAccountConnectionsAsync(array{
 *     environmentName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     requestedBy?: 'ENVIRONMENT_ACCOUNT'|'MANAGEMENT_ACCOUNT',
 *     statuses?: list<'CONNECTED'|'PENDING'|'REJECTED'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnvironmentOutputs(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentOutputs(array{deploymentId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentOutputsAsync(array{deploymentId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentProvisionedResources(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentProvisionedResources(array{environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentProvisionedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentProvisionedResourcesAsync(array{environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentTemplateVersions(array{majorVersion?: string, maxResults?: int, nextToken?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentTemplateVersionsAsync(array{majorVersion?: string, maxResults?: int, nextToken?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentTemplates(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{
 *     environmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{
 *     environmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRepositories(array $args = [])
 * @phpstan-method \Aws\Result listRepositories(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRepositorySyncDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listRepositorySyncDefinitions(array{
 *     nextToken?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     syncType?: 'SERVICE_SYNC'|'TEMPLATE_SYNC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array{
 *     nextToken?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     syncType?: 'SERVICE_SYNC'|'TEMPLATE_SYNC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceInstanceOutputs(array $args = [])
 * @phpstan-method \Aws\Result listServiceInstanceOutputs(array{deploymentId?: string, nextToken?: string, serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstanceOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceInstanceOutputsAsync(array{deploymentId?: string, nextToken?: string, serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result listServiceInstanceProvisionedResources(array $args = [])
 * @phpstan-method \Aws\Result listServiceInstanceProvisionedResources(array{nextToken?: string, serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstanceProvisionedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceInstanceProvisionedResourcesAsync(array{nextToken?: string, serviceInstanceName?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result listServiceInstances(array $args = [])
 * @phpstan-method \Aws\Result listServiceInstances(array{
 *     filters?: list<array{
 *         key?: 'createdAtAfter'|'createdAtBefore'|'deployedTemplateVersionStatus'|'deploymentStatus'|'environmentName'|'lastDeploymentAttemptedAtAfter'|'lastDeploymentAttemptedAtBefore'|'name'|'serviceName'|'templateName',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceName?: string,
 *     sortBy?: 'createdAt'|'deploymentStatus'|'environmentName'|'lastDeploymentAttemptedAt'|'name'|'serviceName'|'templateName',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceInstancesAsync(array{
 *     filters?: list<array{
 *         key?: 'createdAtAfter'|'createdAtBefore'|'deployedTemplateVersionStatus'|'deploymentStatus'|'environmentName'|'lastDeploymentAttemptedAtAfter'|'lastDeploymentAttemptedAtBefore'|'name'|'serviceName'|'templateName',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serviceName?: string,
 *     sortBy?: 'createdAt'|'deploymentStatus'|'environmentName'|'lastDeploymentAttemptedAt'|'name'|'serviceName'|'templateName',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServicePipelineOutputs(array $args = [])
 * @phpstan-method \Aws\Result listServicePipelineOutputs(array{deploymentId?: string, nextToken?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicePipelineOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicePipelineOutputsAsync(array{deploymentId?: string, nextToken?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result listServicePipelineProvisionedResources(array $args = [])
 * @phpstan-method \Aws\Result listServicePipelineProvisionedResources(array{nextToken?: string, serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicePipelineProvisionedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicePipelineProvisionedResourcesAsync(array{nextToken?: string, serviceName?: string, ...} $args = [])
 * @method \Aws\Result listServiceTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listServiceTemplateVersions(array{majorVersion?: string, maxResults?: int, nextToken?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceTemplateVersionsAsync(array{majorVersion?: string, maxResults?: int, nextToken?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result listServiceTemplates(array $args = [])
 * @phpstan-method \Aws\Result listServiceTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result notifyResourceDeploymentStatusChange(array $args = [])
 * @phpstan-method \Aws\Result notifyResourceDeploymentStatusChange(array{
 *     deploymentId?: string,
 *     outputs?: list<array{key?: string, valueString?: string, ...}>,
 *     resourceArn?: string,
 *     status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED',
 *     statusMessage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyResourceDeploymentStatusChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyResourceDeploymentStatusChangeAsync(array{
 *     deploymentId?: string,
 *     outputs?: list<array{key?: string, valueString?: string, ...}>,
 *     resourceArn?: string,
 *     status?: 'FAILED'|'IN_PROGRESS'|'SUCCEEDED',
 *     statusMessage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result rejectEnvironmentAccountConnection(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectEnvironmentAccountConnectionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{
 *     deletePipelineProvisioningRepository?: bool,
 *     pipelineCodebuildRoleArn?: string,
 *     pipelineProvisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     pipelineServiceRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{
 *     deletePipelineProvisioningRepository?: bool,
 *     pipelineCodebuildRoleArn?: string,
 *     pipelineProvisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     pipelineServiceRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @phpstan-method \Aws\Result updateComponent(array{
 *     clientToken?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'NONE',
 *     description?: string,
 *     name?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     serviceSpec?: string,
 *     templateFile?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComponentAsync(array{
 *     clientToken?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'NONE',
 *     description?: string,
 *     name?: string,
 *     serviceInstanceName?: string,
 *     serviceName?: string,
 *     serviceSpec?: string,
 *     templateFile?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     description?: string,
 *     environmentAccountConnectionId?: string,
 *     name?: string,
 *     protonServiceRoleArn?: string,
 *     provisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     codebuildRoleArn?: string,
 *     componentRoleArn?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     description?: string,
 *     environmentAccountConnectionId?: string,
 *     name?: string,
 *     protonServiceRoleArn?: string,
 *     provisioningRepository?: array{branch?: string, name?: string, provider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE', ...},
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironmentAccountConnection(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentAccountConnection(array{codebuildRoleArn?: string, componentRoleArn?: string, id?: string, roleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAccountConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAccountConnectionAsync(array{codebuildRoleArn?: string, componentRoleArn?: string, id?: string, roleArn?: string, ...} $args = [])
 * @method \Aws\Result updateEnvironmentTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentTemplate(array{description?: string, displayName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateAsync(array{description?: string, displayName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateEnvironmentTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentTemplateVersion(array{
 *     description?: string,
 *     majorVersion?: string,
 *     minorVersion?: string,
 *     status?: 'DRAFT'|'PUBLISHED'|'REGISTRATION_FAILED'|'REGISTRATION_IN_PROGRESS',
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateVersionAsync(array{
 *     description?: string,
 *     majorVersion?: string,
 *     minorVersion?: string,
 *     status?: 'DRAFT'|'PUBLISHED'|'REGISTRATION_FAILED'|'REGISTRATION_IN_PROGRESS',
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{description?: string, name?: string, spec?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{description?: string, name?: string, spec?: string, ...} $args = [])
 * @method \Aws\Result updateServiceInstance(array $args = [])
 * @phpstan-method \Aws\Result updateServiceInstance(array{
 *     clientToken?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     name?: string,
 *     serviceName?: string,
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceInstanceAsync(array{
 *     clientToken?: string,
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     name?: string,
 *     serviceName?: string,
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServicePipeline(array $args = [])
 * @phpstan-method \Aws\Result updateServicePipeline(array{
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     serviceName?: string,
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServicePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServicePipelineAsync(array{
 *     deploymentType?: 'CURRENT_VERSION'|'MAJOR_VERSION'|'MINOR_VERSION'|'NONE',
 *     serviceName?: string,
 *     spec?: string,
 *     templateMajorVersion?: string,
 *     templateMinorVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceSyncBlocker(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSyncBlocker(array{id?: string, resolvedReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSyncBlockerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSyncBlockerAsync(array{id?: string, resolvedReason?: string, ...} $args = [])
 * @method \Aws\Result updateServiceSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSyncConfig(array{
 *     branch?: string,
 *     filePath?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSyncConfigAsync(array{
 *     branch?: string,
 *     filePath?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     serviceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateServiceTemplate(array{description?: string, displayName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceTemplateAsync(array{description?: string, displayName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateServiceTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result updateServiceTemplateVersion(array{
 *     compatibleEnvironmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     description?: string,
 *     majorVersion?: string,
 *     minorVersion?: string,
 *     status?: 'DRAFT'|'PUBLISHED'|'REGISTRATION_FAILED'|'REGISTRATION_IN_PROGRESS',
 *     supportedComponentSources?: list<'DIRECTLY_DEFINED'>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceTemplateVersionAsync(array{
 *     compatibleEnvironmentTemplates?: list<array{majorVersion?: string, templateName?: string, ...}>,
 *     description?: string,
 *     majorVersion?: string,
 *     minorVersion?: string,
 *     status?: 'DRAFT'|'PUBLISHED'|'REGISTRATION_FAILED'|'REGISTRATION_IN_PROGRESS',
 *     supportedComponentSources?: list<'DIRECTLY_DEFINED'>,
 *     templateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplateSyncConfig(array $args = [])
 * @phpstan-method \Aws\Result updateTemplateSyncConfig(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     subdirectory?: string,
 *     templateName?: string,
 *     templateType?: 'ENVIRONMENT'|'SERVICE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateSyncConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateSyncConfigAsync(array{
 *     branch?: string,
 *     repositoryName?: string,
 *     repositoryProvider?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE',
 *     subdirectory?: string,
 *     templateName?: string,
 *     templateType?: 'ENVIRONMENT'|'SERVICE',
 *     ...,
 * } $args = [])
 */
class ProtonClient extends AwsClient {}
