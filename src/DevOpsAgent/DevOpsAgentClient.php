<?php
namespace Aws\DevOpsAgent;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS DevOps Agent Service** service.
 * @method \Aws\Result associateService(array $args = [])
 * @phpstan-method \Aws\Result associateService(array{
 *     agentSpaceId?: string,
 *     serviceId?: string,
 *     configuration?: array{
 *         sourceAws?: array{accountId?: string, accountType?: 'source', assumableRoleArn?: string, externalId?: string, ...},
 *         aws?: array{assumableRoleArn?: string, accountId?: string, accountType?: 'monitor', ...},
 *         github?: array{
 *             repoName?: string,
 *             repoId?: string,
 *             owner?: string,
 *             ownerType?: 'organization'|'user',
 *             instanceIdentifier?: string,
 *             runtimeRoleArn?: string,
 *             ...,
 *         },
 *         slack?: array{workspaceId?: string, workspaceName?: string, transmissionTarget?: array, ...},
 *         dynatrace?: array{envId?: string, resources?: list<string>, ...},
 *         servicenow?: array{instanceId?: string, authScopes?: list<string>, ...},
 *         mcpservernewrelic?: array{accountId?: string, endpoint?: string, ...},
 *         mcpserverdatadog?: array,
 *         mcpserver?: array{tools?: list<string>, ...},
 *         gitlab?: array{projectId?: string, projectPath?: string, instanceIdentifier?: string, runtimeRoleArn?: string, ...},
 *         mcpserversplunk?: array,
 *         eventChannel?: array,
 *         azure?: array{subscriptionId?: string, ...},
 *         azuredevops?: array{organizationName?: string, projectId?: string, projectName?: string, ...},
 *         mcpservergrafana?: array{endpoint?: string, organizationId?: string, tools?: list<string>, ...},
 *         pagerduty?: array{services?: list<string>, customerEmail?: string, ...},
 *         mcpserversigv4?: array{tools?: list<string>, ...},
 *         remoteagent?: array,
 *         remoteagentsigv4?: array,
 *         ...,
 *     },
 *     capabilities?: array<string, array{enabled?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateServiceAsync(array{
 *     agentSpaceId?: string,
 *     serviceId?: string,
 *     configuration?: array{
 *         sourceAws?: array{accountId?: string, accountType?: 'source', assumableRoleArn?: string, externalId?: string, ...},
 *         aws?: array{assumableRoleArn?: string, accountId?: string, accountType?: 'monitor', ...},
 *         github?: array{
 *             repoName?: string,
 *             repoId?: string,
 *             owner?: string,
 *             ownerType?: 'organization'|'user',
 *             instanceIdentifier?: string,
 *             runtimeRoleArn?: string,
 *             ...,
 *         },
 *         slack?: array{workspaceId?: string, workspaceName?: string, transmissionTarget?: array, ...},
 *         dynatrace?: array{envId?: string, resources?: list<string>, ...},
 *         servicenow?: array{instanceId?: string, authScopes?: list<string>, ...},
 *         mcpservernewrelic?: array{accountId?: string, endpoint?: string, ...},
 *         mcpserverdatadog?: array,
 *         mcpserver?: array{tools?: list<string>, ...},
 *         gitlab?: array{projectId?: string, projectPath?: string, instanceIdentifier?: string, runtimeRoleArn?: string, ...},
 *         mcpserversplunk?: array,
 *         eventChannel?: array,
 *         azure?: array{subscriptionId?: string, ...},
 *         azuredevops?: array{organizationName?: string, projectId?: string, projectName?: string, ...},
 *         mcpservergrafana?: array{endpoint?: string, organizationId?: string, tools?: list<string>, ...},
 *         pagerduty?: array{services?: list<string>, customerEmail?: string, ...},
 *         mcpserversigv4?: array{tools?: list<string>, ...},
 *         remoteagent?: array,
 *         remoteagentsigv4?: array,
 *         ...,
 *     },
 *     capabilities?: array<string, array{enabled?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result createAgentSpace(array{
 *     name?: string,
 *     description?: string,
 *     locale?: string,
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentSpaceAsync(array{
 *     name?: string,
 *     description?: string,
 *     locale?: string,
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @phpstan-method \Aws\Result createAsset(array{
 *     agentSpaceId?: string,
 *     assetType?: string,
 *     metadata?: array,
 *     content?: array{
 *         file?: array{path?: string, body?: array, metadata?: array, ...},
 *         zip?: array{zipFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         sourceUrl?: array{url?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetAsync(array{
 *     agentSpaceId?: string,
 *     assetType?: string,
 *     metadata?: array,
 *     content?: array{
 *         file?: array{path?: string, body?: array, metadata?: array, ...},
 *         zip?: array{zipFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         sourceUrl?: array{url?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetFile(array $args = [])
 * @phpstan-method \Aws\Result createAssetFile(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     path?: string,
 *     content?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, text?: string, ...},
 *     metadata?: array,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetFileAsync(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     path?: string,
 *     content?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, text?: string, ...},
 *     metadata?: array,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBacklogTask(array $args = [])
 * @phpstan-method \Aws\Result createBacklogTask(array{
 *     agentSpaceId?: string,
 *     reference?: array{
 *         system?: string,
 *         title?: string,
 *         referenceId?: string,
 *         referenceUrl?: string,
 *         associationId?: string,
 *         ...,
 *     },
 *     taskType?: 'EVALUATION'|'INVESTIGATION'|'RELEASE_READINESS_REVIEW'|'RELEASE_TESTING',
 *     title?: string,
 *     description?: string,
 *     priority?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'MINIMAL',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBacklogTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBacklogTaskAsync(array{
 *     agentSpaceId?: string,
 *     reference?: array{
 *         system?: string,
 *         title?: string,
 *         referenceId?: string,
 *         referenceUrl?: string,
 *         associationId?: string,
 *         ...,
 *     },
 *     taskType?: 'EVALUATION'|'INVESTIGATION'|'RELEASE_READINESS_REVIEW'|'RELEASE_TESTING',
 *     title?: string,
 *     description?: string,
 *     priority?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'MINIMAL',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChat(array $args = [])
 * @phpstan-method \Aws\Result createChat(array{agentSpaceId?: string, userId?: string, userType?: 'IAM'|'IDC'|'IDP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChatAsync(array{agentSpaceId?: string, userId?: string, userType?: 'IAM'|'IDC'|'IDP', ...} $args = [])
 * @method \Aws\Result createPrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result createPrivateConnection(array{
 *     name?: string,
 *     mode?: array{
 *         serviceManaged?: array{
 *             hostAddress?: string,
 *             vpcId?: string,
 *             subnetIds?: list<string>,
 *             securityGroupIds?: list<string>,
 *             ipAddressType?: 'DUAL_STACK'|'IPV4'|'IPV6',
 *             ipv4AddressesPerEni?: int,
 *             portRanges?: list<string>,
 *             certificate?: string,
 *             dnsResolution?: 'IN_VPC'|'PUBLIC',
 *             ...,
 *         },
 *         selfManaged?: array{resourceConfigurationId?: string, certificate?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivateConnectionAsync(array{
 *     name?: string,
 *     mode?: array{
 *         serviceManaged?: array{
 *             hostAddress?: string,
 *             vpcId?: string,
 *             subnetIds?: list<string>,
 *             securityGroupIds?: list<string>,
 *             ipAddressType?: 'DUAL_STACK'|'IPV4'|'IPV6',
 *             ipv4AddressesPerEni?: int,
 *             portRanges?: list<string>,
 *             certificate?: string,
 *             dnsResolution?: 'IN_VPC'|'PUBLIC',
 *             ...,
 *         },
 *         selfManaged?: array{resourceConfigurationId?: string, certificate?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrigger(array $args = [])
 * @phpstan-method \Aws\Result createTrigger(array{
 *     agentSpaceId?: string,
 *     type?: string,
 *     condition?: array{schedule?: array{expression?: string, ...}, ...},
 *     action?: array,
 *     status?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTriggerAsync(array{
 *     agentSpaceId?: string,
 *     type?: string,
 *     condition?: array{schedule?: array{expression?: string, ...}, ...},
 *     action?: array,
 *     status?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentSpace(array{agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentSpaceAsync(array{agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{agentSpaceId?: string, assetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{agentSpaceId?: string, assetId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssetFile(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetFile(array{agentSpaceId?: string, assetId?: string, path?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetFileAsync(array{agentSpaceId?: string, assetId?: string, path?: string, ...} $args = [])
 * @method \Aws\Result deletePrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result deletePrivateConnection(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrivateConnectionAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteTrigger(array $args = [])
 * @phpstan-method \Aws\Result deleteTrigger(array{agentSpaceId?: string, triggerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTriggerAsync(array{agentSpaceId?: string, triggerId?: string, ...} $args = [])
 * @method \Aws\Result deregisterService(array $args = [])
 * @phpstan-method \Aws\Result deregisterService(array{serviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterServiceAsync(array{serviceId?: string, ...} $args = [])
 * @method \Aws\Result describePrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result describePrivateConnection(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePrivateConnectionAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result disableOperatorApp(array $args = [])
 * @phpstan-method \Aws\Result disableOperatorApp(array{agentSpaceId?: string, authFlow?: 'iam'|'idc'|'idp', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOperatorAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOperatorAppAsync(array{agentSpaceId?: string, authFlow?: 'iam'|'idc'|'idp', ...} $args = [])
 * @method \Aws\Result disassociateService(array $args = [])
 * @phpstan-method \Aws\Result disassociateService(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateServiceAsync(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result enableOperatorApp(array $args = [])
 * @phpstan-method \Aws\Result enableOperatorApp(array{
 *     agentSpaceId?: string,
 *     authFlow?: 'iam'|'idc'|'idp',
 *     operatorAppRoleArn?: string,
 *     idcInstanceArn?: string,
 *     issuerUrl?: string,
 *     idpClientId?: string,
 *     idpClientSecret?: string,
 *     provider?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOperatorAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOperatorAppAsync(array{
 *     agentSpaceId?: string,
 *     authFlow?: 'iam'|'idc'|'idp',
 *     operatorAppRoleArn?: string,
 *     idcInstanceArn?: string,
 *     issuerUrl?: string,
 *     idpClientId?: string,
 *     idpClientSecret?: string,
 *     provider?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAccountUsage(array $args = [])
 * @phpstan-method \Aws\Result getAccountUsage(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountUsageAsync(array{...} $args = [])
 * @method \Aws\Result getAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result getAgentSpace(array{agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentSpaceAsync(array{agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result getAsset(array $args = [])
 * @phpstan-method \Aws\Result getAsset(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetAsync(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, ...} $args = [])
 * @method \Aws\Result getAssetContent(array $args = [])
 * @phpstan-method \Aws\Result getAssetContent(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetContentAsync(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, ...} $args = [])
 * @method \Aws\Result getAssetFile(array $args = [])
 * @phpstan-method \Aws\Result getAssetFile(array{agentSpaceId?: string, assetId?: string, path?: string, assetVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetFileAsync(array{agentSpaceId?: string, assetId?: string, path?: string, assetVersion?: int, ...} $args = [])
 * @method \Aws\Result getAssociation(array $args = [])
 * @phpstan-method \Aws\Result getAssociation(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssociationAsync(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result getBacklogTask(array $args = [])
 * @phpstan-method \Aws\Result getBacklogTask(array{agentSpaceId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBacklogTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBacklogTaskAsync(array{agentSpaceId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getOperatorApp(array $args = [])
 * @phpstan-method \Aws\Result getOperatorApp(array{agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperatorAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperatorAppAsync(array{agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result getRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getRecommendation(array{agentSpaceId?: string, recommendationId?: string, recommendationVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationAsync(array{agentSpaceId?: string, recommendationId?: string, recommendationVersion?: int, ...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{serviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{serviceId?: string, ...} $args = [])
 * @method \Aws\Result getTrigger(array $args = [])
 * @phpstan-method \Aws\Result getTrigger(array{agentSpaceId?: string, triggerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTriggerAsync(array{agentSpaceId?: string, triggerId?: string, ...} $args = [])
 * @method \Aws\Result listAgentSpaces(array $args = [])
 * @phpstan-method \Aws\Result listAgentSpaces(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentSpacesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssetFiles(array $args = [])
 * @phpstan-method \Aws\Result listAssetFiles(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetFilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetFilesAsync(array{agentSpaceId?: string, assetId?: string, assetVersion?: int, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssetTypes(array $args = [])
 * @phpstan-method \Aws\Result listAssetTypes(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetTypesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssetVersions(array $args = [])
 * @phpstan-method \Aws\Result listAssetVersions(array{agentSpaceId?: string, assetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetVersionsAsync(array{agentSpaceId?: string, assetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssets(array $args = [])
 * @phpstan-method \Aws\Result listAssets(array{
 *     agentSpaceId?: string,
 *     assetType?: string,
 *     updatedAfter?: int|string|\DateTimeInterface,
 *     updatedBefore?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetsAsync(array{
 *     agentSpaceId?: string,
 *     assetType?: string,
 *     updatedAfter?: int|string|\DateTimeInterface,
 *     updatedBefore?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssociations(array{agentSpaceId?: string, maxResults?: int, nextToken?: string, filterServiceTypes?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationsAsync(array{agentSpaceId?: string, maxResults?: int, nextToken?: string, filterServiceTypes?: string, ...} $args = [])
 * @method \Aws\Result listBacklogTasks(array $args = [])
 * @phpstan-method \Aws\Result listBacklogTasks(array{
 *     agentSpaceId?: string,
 *     filter?: array{
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         priority?: list<'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'MINIMAL'>,
 *         status?: list<'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'LINKED'|'PENDING_CUSTOMER_APPROVAL'|'PENDING_START'|'PENDING_TRIAGE'|'SKIPPED'|'TIMED_OUT'>,
 *         taskType?: list<'EVALUATION'|'INVESTIGATION'|'RELEASE_READINESS_REVIEW'|'RELEASE_TESTING'>,
 *         primaryTaskId?: string,
 *         ...,
 *     },
 *     limit?: int,
 *     nextToken?: string,
 *     sortField?: 'CREATED_AT'|'PRIORITY',
 *     order?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBacklogTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBacklogTasksAsync(array{
 *     agentSpaceId?: string,
 *     filter?: array{
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         priority?: list<'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'MINIMAL'>,
 *         status?: list<'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'LINKED'|'PENDING_CUSTOMER_APPROVAL'|'PENDING_START'|'PENDING_TRIAGE'|'SKIPPED'|'TIMED_OUT'>,
 *         taskType?: list<'EVALUATION'|'INVESTIGATION'|'RELEASE_READINESS_REVIEW'|'RELEASE_TESTING'>,
 *         primaryTaskId?: string,
 *         ...,
 *     },
 *     limit?: int,
 *     nextToken?: string,
 *     sortField?: 'CREATED_AT'|'PRIORITY',
 *     order?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChats(array $args = [])
 * @phpstan-method \Aws\Result listChats(array{agentSpaceId?: string, userId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChatsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChatsAsync(array{agentSpaceId?: string, userId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{agentSpaceId?: string, taskId?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{agentSpaceId?: string, taskId?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listGoals(array $args = [])
 * @phpstan-method \Aws\Result listGoals(array{
 *     agentSpaceId?: string,
 *     status?: 'ACTIVE'|'COMPLETE'|'PAUSED',
 *     goalType?: 'CUSTOMER_DEFINED'|'ONCALL_REPORT',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGoalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGoalsAsync(array{
 *     agentSpaceId?: string,
 *     status?: 'ACTIVE'|'COMPLETE'|'PAUSED',
 *     goalType?: 'CUSTOMER_DEFINED'|'ONCALL_REPORT',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJournalRecords(array $args = [])
 * @phpstan-method \Aws\Result listJournalRecords(array{
 *     agentSpaceId?: string,
 *     executionId?: string,
 *     limit?: int,
 *     nextToken?: string,
 *     recordType?: string,
 *     order?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJournalRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJournalRecordsAsync(array{
 *     agentSpaceId?: string,
 *     executionId?: string,
 *     limit?: int,
 *     nextToken?: string,
 *     recordType?: string,
 *     order?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPendingMessages(array $args = [])
 * @phpstan-method \Aws\Result listPendingMessages(array{agentSpaceId?: string, executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPendingMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPendingMessagesAsync(array{agentSpaceId?: string, executionId?: string, ...} $args = [])
 * @method \Aws\Result listPrivateConnections(array $args = [])
 * @phpstan-method \Aws\Result listPrivateConnections(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrivateConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrivateConnectionsAsync(array{...} $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{
 *     agentSpaceId?: string,
 *     taskId?: string,
 *     goalId?: string,
 *     status?: 'ACCEPTED'|'CLOSED'|'COMPLETED'|'PROPOSED'|'REJECTED'|'UPDATE_IN_PROGRESS',
 *     priority?: 'HIGH'|'LOW'|'MEDIUM',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{
 *     agentSpaceId?: string,
 *     taskId?: string,
 *     goalId?: string,
 *     status?: 'ACCEPTED'|'CLOSED'|'COMPLETED'|'PROPOSED'|'REJECTED'|'UPDATE_IN_PROGRESS',
 *     priority?: 'HIGH'|'LOW'|'MEDIUM',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterServiceType?: 'azure'|'azuredevops'|'azureidentity'|'dynatrace'|'eventChannel'|'github'|'gitlab'|'mcpserver'|'mcpserverdatadog'|'mcpservergrafana'|'mcpservernewrelic'|'mcpserversigv4'|'mcpserversplunk'|'pagerduty'|'remoteagent'|'remoteagentsigv4'|'servicenow'|'slack',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterServiceType?: 'azure'|'azuredevops'|'azureidentity'|'dynatrace'|'eventChannel'|'github'|'gitlab'|'mcpserver'|'mcpserverdatadog'|'mcpservergrafana'|'mcpservernewrelic'|'mcpserversigv4'|'mcpserversplunk'|'pagerduty'|'remoteagent'|'remoteagentsigv4'|'servicenow'|'slack',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTriggers(array $args = [])
 * @phpstan-method \Aws\Result listTriggers(array{agentSpaceId?: string, status?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTriggersAsync(array{agentSpaceId?: string, status?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWebhooks(array $args = [])
 * @phpstan-method \Aws\Result listWebhooks(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebhooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebhooksAsync(array{agentSpaceId?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result registerService(array $args = [])
 * @phpstan-method \Aws\Result registerService(array{
 *     service?: 'azureidentity'|'dynatrace'|'eventChannel'|'gitlab'|'mcpserver'|'mcpserverdatadog'|'mcpservergrafana'|'mcpservernewrelic'|'mcpserversigv4'|'mcpserversplunk'|'pagerduty'|'remoteagent'|'remoteagentsigv4'|'servicenow',
 *     serviceDetails?: array{
 *         dynatrace?: array{accountUrn?: string, authorizationConfig?: array, ...},
 *         servicenow?: array{instanceUrl?: string, authorizationConfig?: array, ...},
 *         mcpserverdatadog?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         mcpserver?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         gitlab?: array{targetUrl?: string, tokenType?: 'group'|'personal', tokenValue?: string, groupId?: string, ...},
 *         mcpserversplunk?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         mcpservernewrelic?: array{authorizationConfig?: array, ...},
 *         eventChannel?: array{type?: 'webhook', ...},
 *         mcpservergrafana?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         pagerduty?: array{scopes?: list<string>, authorizationConfig?: array, ...},
 *         azureidentity?: array{
 *             tenantId?: string,
 *             clientId?: string,
 *             webIdentityRoleArn?: string,
 *             webIdentityTokenAudiences?: list<string>,
 *             ...,
 *         },
 *         mcpserversigv4?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         remoteagent?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         remoteagentsigv4?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     privateConnectionName?: string,
 *     targetUrlPrivateConnectionName?: string,
 *     exchangeUrlPrivateConnectionName?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerServiceAsync(array{
 *     service?: 'azureidentity'|'dynatrace'|'eventChannel'|'gitlab'|'mcpserver'|'mcpserverdatadog'|'mcpservergrafana'|'mcpservernewrelic'|'mcpserversigv4'|'mcpserversplunk'|'pagerduty'|'remoteagent'|'remoteagentsigv4'|'servicenow',
 *     serviceDetails?: array{
 *         dynatrace?: array{accountUrn?: string, authorizationConfig?: array, ...},
 *         servicenow?: array{instanceUrl?: string, authorizationConfig?: array, ...},
 *         mcpserverdatadog?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         mcpserver?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         gitlab?: array{targetUrl?: string, tokenType?: 'group'|'personal', tokenValue?: string, groupId?: string, ...},
 *         mcpserversplunk?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         mcpservernewrelic?: array{authorizationConfig?: array, ...},
 *         eventChannel?: array{type?: 'webhook', ...},
 *         mcpservergrafana?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         pagerduty?: array{scopes?: list<string>, authorizationConfig?: array, ...},
 *         azureidentity?: array{
 *             tenantId?: string,
 *             clientId?: string,
 *             webIdentityRoleArn?: string,
 *             webIdentityTokenAudiences?: list<string>,
 *             ...,
 *         },
 *         mcpserversigv4?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         remoteagent?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         remoteagentsigv4?: array{name?: string, endpoint?: string, description?: string, authorizationConfig?: array, ...},
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     privateConnectionName?: string,
 *     targetUrlPrivateConnectionName?: string,
 *     exchangeUrlPrivateConnectionName?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendMessage(array $args = [])
 * @phpstan-method \Aws\Result sendMessage(array{
 *     agentSpaceId?: string,
 *     executionId?: string,
 *     content?: string,
 *     context?: array{currentPage?: string, lastMessage?: string, userActionResponse?: string, ...},
 *     userId?: string,
 *     assetIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessageAsync(array{
 *     agentSpaceId?: string,
 *     executionId?: string,
 *     content?: string,
 *     context?: array{currentPage?: string, lastMessage?: string, userActionResponse?: string, ...},
 *     userId?: string,
 *     assetIds?: list<string>,
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
 * @method \Aws\Result updateAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result updateAgentSpace(array{agentSpaceId?: string, name?: string, description?: string, locale?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentSpaceAsync(array{agentSpaceId?: string, name?: string, description?: string, locale?: string, ...} $args = [])
 * @method \Aws\Result updateAsset(array $args = [])
 * @phpstan-method \Aws\Result updateAsset(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     metadata?: array,
 *     content?: array{
 *         file?: array{path?: string, body?: array, metadata?: array, ...},
 *         zip?: array{zipFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         sourceUrl?: array{url?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetAsync(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     metadata?: array,
 *     content?: array{
 *         file?: array{path?: string, body?: array, metadata?: array, ...},
 *         zip?: array{zipFile?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         sourceUrl?: array{url?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssetFile(array $args = [])
 * @phpstan-method \Aws\Result updateAssetFile(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     path?: string,
 *     content?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, text?: string, ...},
 *     metadata?: array,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetFileAsync(array{
 *     agentSpaceId?: string,
 *     assetId?: string,
 *     path?: string,
 *     content?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, text?: string, ...},
 *     metadata?: array,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateAssociation(array{
 *     agentSpaceId?: string,
 *     associationId?: string,
 *     configuration?: array{
 *         sourceAws?: array{accountId?: string, accountType?: 'source', assumableRoleArn?: string, externalId?: string, ...},
 *         aws?: array{assumableRoleArn?: string, accountId?: string, accountType?: 'monitor', ...},
 *         github?: array{
 *             repoName?: string,
 *             repoId?: string,
 *             owner?: string,
 *             ownerType?: 'organization'|'user',
 *             instanceIdentifier?: string,
 *             runtimeRoleArn?: string,
 *             ...,
 *         },
 *         slack?: array{workspaceId?: string, workspaceName?: string, transmissionTarget?: array, ...},
 *         dynatrace?: array{envId?: string, resources?: list<string>, ...},
 *         servicenow?: array{instanceId?: string, authScopes?: list<string>, ...},
 *         mcpservernewrelic?: array{accountId?: string, endpoint?: string, ...},
 *         mcpserverdatadog?: array,
 *         mcpserver?: array{tools?: list<string>, ...},
 *         gitlab?: array{projectId?: string, projectPath?: string, instanceIdentifier?: string, runtimeRoleArn?: string, ...},
 *         mcpserversplunk?: array,
 *         eventChannel?: array,
 *         azure?: array{subscriptionId?: string, ...},
 *         azuredevops?: array{organizationName?: string, projectId?: string, projectName?: string, ...},
 *         mcpservergrafana?: array{endpoint?: string, organizationId?: string, tools?: list<string>, ...},
 *         pagerduty?: array{services?: list<string>, customerEmail?: string, ...},
 *         mcpserversigv4?: array{tools?: list<string>, ...},
 *         remoteagent?: array,
 *         remoteagentsigv4?: array,
 *         ...,
 *     },
 *     capabilities?: array<string, array{enabled?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssociationAsync(array{
 *     agentSpaceId?: string,
 *     associationId?: string,
 *     configuration?: array{
 *         sourceAws?: array{accountId?: string, accountType?: 'source', assumableRoleArn?: string, externalId?: string, ...},
 *         aws?: array{assumableRoleArn?: string, accountId?: string, accountType?: 'monitor', ...},
 *         github?: array{
 *             repoName?: string,
 *             repoId?: string,
 *             owner?: string,
 *             ownerType?: 'organization'|'user',
 *             instanceIdentifier?: string,
 *             runtimeRoleArn?: string,
 *             ...,
 *         },
 *         slack?: array{workspaceId?: string, workspaceName?: string, transmissionTarget?: array, ...},
 *         dynatrace?: array{envId?: string, resources?: list<string>, ...},
 *         servicenow?: array{instanceId?: string, authScopes?: list<string>, ...},
 *         mcpservernewrelic?: array{accountId?: string, endpoint?: string, ...},
 *         mcpserverdatadog?: array,
 *         mcpserver?: array{tools?: list<string>, ...},
 *         gitlab?: array{projectId?: string, projectPath?: string, instanceIdentifier?: string, runtimeRoleArn?: string, ...},
 *         mcpserversplunk?: array,
 *         eventChannel?: array,
 *         azure?: array{subscriptionId?: string, ...},
 *         azuredevops?: array{organizationName?: string, projectId?: string, projectName?: string, ...},
 *         mcpservergrafana?: array{endpoint?: string, organizationId?: string, tools?: list<string>, ...},
 *         pagerduty?: array{services?: list<string>, customerEmail?: string, ...},
 *         mcpserversigv4?: array{tools?: list<string>, ...},
 *         remoteagent?: array,
 *         remoteagentsigv4?: array,
 *         ...,
 *     },
 *     capabilities?: array<string, array{enabled?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBacklogTask(array $args = [])
 * @phpstan-method \Aws\Result updateBacklogTask(array{
 *     agentSpaceId?: string,
 *     taskId?: string,
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'LINKED'|'PENDING_CUSTOMER_APPROVAL'|'PENDING_START'|'PENDING_TRIAGE'|'SKIPPED'|'TIMED_OUT',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBacklogTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBacklogTaskAsync(array{
 *     agentSpaceId?: string,
 *     taskId?: string,
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'LINKED'|'PENDING_CUSTOMER_APPROVAL'|'PENDING_START'|'PENDING_TRIAGE'|'SKIPPED'|'TIMED_OUT',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGoal(array $args = [])
 * @phpstan-method \Aws\Result updateGoal(array{
 *     agentSpaceId?: string,
 *     goalId?: string,
 *     evaluationSchedule?: array{state?: 'DISABLED'|'ENABLED', ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGoalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGoalAsync(array{
 *     agentSpaceId?: string,
 *     goalId?: string,
 *     evaluationSchedule?: array{state?: 'DISABLED'|'ENABLED', ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOperatorAppIdpConfig(array $args = [])
 * @phpstan-method \Aws\Result updateOperatorAppIdpConfig(array{agentSpaceId?: string, idpClientSecret?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOperatorAppIdpConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOperatorAppIdpConfigAsync(array{agentSpaceId?: string, idpClientSecret?: string, ...} $args = [])
 * @method \Aws\Result updatePrivateConnectionCertificate(array $args = [])
 * @phpstan-method \Aws\Result updatePrivateConnectionCertificate(array{name?: string, certificate?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrivateConnectionCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrivateConnectionCertificateAsync(array{name?: string, certificate?: string, ...} $args = [])
 * @method \Aws\Result updateRecommendation(array $args = [])
 * @phpstan-method \Aws\Result updateRecommendation(array{
 *     agentSpaceId?: string,
 *     recommendationId?: string,
 *     status?: 'ACCEPTED'|'CLOSED'|'COMPLETED'|'PROPOSED'|'REJECTED'|'UPDATE_IN_PROGRESS',
 *     additionalContext?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecommendationAsync(array{
 *     agentSpaceId?: string,
 *     recommendationId?: string,
 *     status?: 'ACCEPTED'|'CLOSED'|'COMPLETED'|'PROPOSED'|'REJECTED'|'UPDATE_IN_PROGRESS',
 *     additionalContext?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrigger(array $args = [])
 * @phpstan-method \Aws\Result updateTrigger(array{agentSpaceId?: string, triggerId?: string, status?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTriggerAsync(array{agentSpaceId?: string, triggerId?: string, status?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result validateAwsAssociations(array $args = [])
 * @phpstan-method \Aws\Result validateAwsAssociations(array{agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateAwsAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateAwsAssociationsAsync(array{agentSpaceId?: string, ...} $args = [])
 */
class DevOpsAgentClient extends AwsClient {}
