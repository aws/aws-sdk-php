<?php
namespace Aws\IoTTwinMaker;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT TwinMaker** service.
 * @method \Aws\Result batchPutPropertyValues(array $args = [])
 * @phpstan-method \Aws\Result batchPutPropertyValues(array{
 *     workspaceId?: string,
 *     entries?: list<array{entityPropertyReference?: array, propertyValues?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutPropertyValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutPropertyValuesAsync(array{
 *     workspaceId?: string,
 *     entries?: list<array{entityPropertyReference?: array, propertyValues?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelMetadataTransferJob(array $args = [])
 * @phpstan-method \Aws\Result cancelMetadataTransferJob(array{metadataTransferJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMetadataTransferJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMetadataTransferJobAsync(array{metadataTransferJobId?: string, ...} $args = [])
 * @method \Aws\Result createComponentType(array $args = [])
 * @phpstan-method \Aws\Result createComponentType(array{
 *     workspaceId?: string,
 *     isSingleton?: bool,
 *     componentTypeId?: string,
 *     description?: string,
 *     propertyDefinitions?: array<string, array{
 *         dataType?: array,
 *         isRequiredInEntity?: bool,
 *         isExternalId?: bool,
 *         isStoredExternally?: bool,
 *         isTimeSeries?: bool,
 *         defaultValue?: array,
 *         configuration?: array<string, string>,
 *         displayName?: string,
 *         ...,
 *     }>,
 *     extendsFrom?: list<string>,
 *     functions?: array<string, array{requiredProperties?: list<string>, scope?: 'ENTITY'|'WORKSPACE', implementedBy?: array, ...}>,
 *     tags?: array<string, string>,
 *     propertyGroups?: array<string, array{groupType?: 'TABULAR', propertyNames?: list<string>, ...}>,
 *     componentTypeName?: string,
 *     compositeComponentTypes?: array<string, array{componentTypeId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentTypeAsync(array{
 *     workspaceId?: string,
 *     isSingleton?: bool,
 *     componentTypeId?: string,
 *     description?: string,
 *     propertyDefinitions?: array<string, array{
 *         dataType?: array,
 *         isRequiredInEntity?: bool,
 *         isExternalId?: bool,
 *         isStoredExternally?: bool,
 *         isTimeSeries?: bool,
 *         defaultValue?: array,
 *         configuration?: array<string, string>,
 *         displayName?: string,
 *         ...,
 *     }>,
 *     extendsFrom?: list<string>,
 *     functions?: array<string, array{requiredProperties?: list<string>, scope?: 'ENTITY'|'WORKSPACE', implementedBy?: array, ...}>,
 *     tags?: array<string, string>,
 *     propertyGroups?: array<string, array{groupType?: 'TABULAR', propertyNames?: list<string>, ...}>,
 *     componentTypeName?: string,
 *     compositeComponentTypes?: array<string, array{componentTypeId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEntity(array $args = [])
 * @phpstan-method \Aws\Result createEntity(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     entityName?: string,
 *     description?: string,
 *     components?: array<string, array{
 *         description?: string,
 *         componentTypeId?: string,
 *         properties?: array<string, array>,
 *         propertyGroups?: array<string, array>,
 *         ...,
 *     }>,
 *     compositeComponents?: array<string, array{description?: string, properties?: array<string, array>, propertyGroups?: array<string, array>, ...}>,
 *     parentEntityId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEntityAsync(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     entityName?: string,
 *     description?: string,
 *     components?: array<string, array{
 *         description?: string,
 *         componentTypeId?: string,
 *         properties?: array<string, array>,
 *         propertyGroups?: array<string, array>,
 *         ...,
 *     }>,
 *     compositeComponents?: array<string, array{description?: string, properties?: array<string, array>, propertyGroups?: array<string, array>, ...}>,
 *     parentEntityId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMetadataTransferJob(array $args = [])
 * @phpstan-method \Aws\Result createMetadataTransferJob(array{
 *     metadataTransferJobId?: string,
 *     description?: string,
 *     sources?: list<array{
 *         type?: 'iotsitewise'|'iottwinmaker'|'s3',
 *         s3Configuration?: array,
 *         iotSiteWiseConfiguration?: array,
 *         iotTwinMakerConfiguration?: array,
 *         ...,
 *     }>,
 *     destination?: array{
 *         type?: 'iotsitewise'|'iottwinmaker'|'s3',
 *         s3Configuration?: array{location?: string, ...},
 *         iotTwinMakerConfiguration?: array{workspace?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMetadataTransferJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMetadataTransferJobAsync(array{
 *     metadataTransferJobId?: string,
 *     description?: string,
 *     sources?: list<array{
 *         type?: 'iotsitewise'|'iottwinmaker'|'s3',
 *         s3Configuration?: array,
 *         iotSiteWiseConfiguration?: array,
 *         iotTwinMakerConfiguration?: array,
 *         ...,
 *     }>,
 *     destination?: array{
 *         type?: 'iotsitewise'|'iottwinmaker'|'s3',
 *         s3Configuration?: array{location?: string, ...},
 *         iotTwinMakerConfiguration?: array{workspace?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScene(array $args = [])
 * @phpstan-method \Aws\Result createScene(array{
 *     workspaceId?: string,
 *     sceneId?: string,
 *     contentLocation?: string,
 *     description?: string,
 *     capabilities?: list<string>,
 *     tags?: array<string, string>,
 *     sceneMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSceneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSceneAsync(array{
 *     workspaceId?: string,
 *     sceneId?: string,
 *     contentLocation?: string,
 *     description?: string,
 *     capabilities?: list<string>,
 *     tags?: array<string, string>,
 *     sceneMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSyncJob(array $args = [])
 * @phpstan-method \Aws\Result createSyncJob(array{workspaceId?: string, syncSource?: string, syncRole?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSyncJobAsync(array{workspaceId?: string, syncSource?: string, syncRole?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createWorkspace(array $args = [])
 * @phpstan-method \Aws\Result createWorkspace(array{
 *     workspaceId?: string,
 *     description?: string,
 *     s3Location?: string,
 *     role?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array{
 *     workspaceId?: string,
 *     description?: string,
 *     s3Location?: string,
 *     role?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComponentType(array $args = [])
 * @phpstan-method \Aws\Result deleteComponentType(array{workspaceId?: string, componentTypeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentTypeAsync(array{workspaceId?: string, componentTypeId?: string, ...} $args = [])
 * @method \Aws\Result deleteEntity(array $args = [])
 * @phpstan-method \Aws\Result deleteEntity(array{workspaceId?: string, entityId?: string, isRecursive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEntityAsync(array{workspaceId?: string, entityId?: string, isRecursive?: bool, ...} $args = [])
 * @method \Aws\Result deleteScene(array $args = [])
 * @phpstan-method \Aws\Result deleteScene(array{workspaceId?: string, sceneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSceneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSceneAsync(array{workspaceId?: string, sceneId?: string, ...} $args = [])
 * @method \Aws\Result deleteSyncJob(array $args = [])
 * @phpstan-method \Aws\Result deleteSyncJob(array{workspaceId?: string, syncSource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSyncJobAsync(array{workspaceId?: string, syncSource?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspace(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspace(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result executeQuery(array $args = [])
 * @phpstan-method \Aws\Result executeQuery(array{workspaceId?: string, queryStatement?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeQueryAsync(array{workspaceId?: string, queryStatement?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getComponentType(array $args = [])
 * @phpstan-method \Aws\Result getComponentType(array{workspaceId?: string, componentTypeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentTypeAsync(array{workspaceId?: string, componentTypeId?: string, ...} $args = [])
 * @method \Aws\Result getEntity(array $args = [])
 * @phpstan-method \Aws\Result getEntity(array{workspaceId?: string, entityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntityAsync(array{workspaceId?: string, entityId?: string, ...} $args = [])
 * @method \Aws\Result getMetadataTransferJob(array $args = [])
 * @phpstan-method \Aws\Result getMetadataTransferJob(array{metadataTransferJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetadataTransferJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetadataTransferJobAsync(array{metadataTransferJobId?: string, ...} $args = [])
 * @method \Aws\Result getPricingPlan(array $args = [])
 * @phpstan-method \Aws\Result getPricingPlan(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPricingPlanAsync(array{...} $args = [])
 * @method \Aws\Result getPropertyValue(array $args = [])
 * @phpstan-method \Aws\Result getPropertyValue(array{
 *     componentName?: string,
 *     componentPath?: string,
 *     componentTypeId?: string,
 *     entityId?: string,
 *     selectedProperties?: list<string>,
 *     workspaceId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     propertyGroupName?: string,
 *     tabularConditions?: array{orderBy?: list<array>, propertyFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPropertyValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPropertyValueAsync(array{
 *     componentName?: string,
 *     componentPath?: string,
 *     componentTypeId?: string,
 *     entityId?: string,
 *     selectedProperties?: list<string>,
 *     workspaceId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     propertyGroupName?: string,
 *     tabularConditions?: array{orderBy?: list<array>, propertyFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPropertyValueHistory(array $args = [])
 * @phpstan-method \Aws\Result getPropertyValueHistory(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     componentName?: string,
 *     componentPath?: string,
 *     componentTypeId?: string,
 *     selectedProperties?: list<string>,
 *     propertyFilters?: list<array{propertyName?: string, operator?: string, value?: array, ...}>,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     interpolation?: array{interpolationType?: 'LINEAR', intervalInSeconds?: int, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     orderByTime?: 'ASCENDING'|'DESCENDING',
 *     startTime?: string,
 *     endTime?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPropertyValueHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPropertyValueHistoryAsync(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     componentName?: string,
 *     componentPath?: string,
 *     componentTypeId?: string,
 *     selectedProperties?: list<string>,
 *     propertyFilters?: list<array{propertyName?: string, operator?: string, value?: array, ...}>,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     interpolation?: array{interpolationType?: 'LINEAR', intervalInSeconds?: int, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     orderByTime?: 'ASCENDING'|'DESCENDING',
 *     startTime?: string,
 *     endTime?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getScene(array $args = [])
 * @phpstan-method \Aws\Result getScene(array{workspaceId?: string, sceneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSceneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSceneAsync(array{workspaceId?: string, sceneId?: string, ...} $args = [])
 * @method \Aws\Result getSyncJob(array $args = [])
 * @phpstan-method \Aws\Result getSyncJob(array{syncSource?: string, workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSyncJobAsync(array{syncSource?: string, workspaceId?: string, ...} $args = [])
 * @method \Aws\Result getWorkspace(array $args = [])
 * @phpstan-method \Aws\Result getWorkspace(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkspaceAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result listComponentTypes(array $args = [])
 * @phpstan-method \Aws\Result listComponentTypes(array{
 *     workspaceId?: string,
 *     filters?: list<array{extendsFrom?: string, namespace?: string, isAbstract?: bool, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentTypesAsync(array{
 *     workspaceId?: string,
 *     filters?: list<array{extendsFrom?: string, namespace?: string, isAbstract?: bool, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     componentPath?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     componentPath?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntities(array $args = [])
 * @phpstan-method \Aws\Result listEntities(array{
 *     workspaceId?: string,
 *     filters?: list<array{parentEntityId?: string, componentTypeId?: string, externalId?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesAsync(array{
 *     workspaceId?: string,
 *     filters?: list<array{parentEntityId?: string, componentTypeId?: string, externalId?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMetadataTransferJobs(array $args = [])
 * @phpstan-method \Aws\Result listMetadataTransferJobs(array{
 *     sourceType?: 'iotsitewise'|'iottwinmaker'|'s3',
 *     destinationType?: 'iotsitewise'|'iottwinmaker'|'s3',
 *     filters?: list<array{
 *         workspaceId?: string,
 *         state?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'ERROR'|'PENDING'|'RUNNING'|'VALIDATING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetadataTransferJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetadataTransferJobsAsync(array{
 *     sourceType?: 'iotsitewise'|'iottwinmaker'|'s3',
 *     destinationType?: 'iotsitewise'|'iottwinmaker'|'s3',
 *     filters?: list<array{
 *         workspaceId?: string,
 *         state?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'ERROR'|'PENDING'|'RUNNING'|'VALIDATING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProperties(array $args = [])
 * @phpstan-method \Aws\Result listProperties(array{
 *     workspaceId?: string,
 *     componentName?: string,
 *     componentPath?: string,
 *     entityId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPropertiesAsync(array{
 *     workspaceId?: string,
 *     componentName?: string,
 *     componentPath?: string,
 *     entityId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listScenes(array $args = [])
 * @phpstan-method \Aws\Result listScenes(array{workspaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScenesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScenesAsync(array{workspaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSyncJobs(array $args = [])
 * @phpstan-method \Aws\Result listSyncJobs(array{workspaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSyncJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSyncJobsAsync(array{workspaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSyncResources(array $args = [])
 * @phpstan-method \Aws\Result listSyncResources(array{
 *     workspaceId?: string,
 *     syncSource?: string,
 *     filters?: list<array{
 *         state?: 'DELETED'|'ERROR'|'INITIALIZING'|'IN_SYNC'|'PROCESSING',
 *         resourceType?: 'COMPONENT_TYPE'|'ENTITY',
 *         resourceId?: string,
 *         externalId?: string,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSyncResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSyncResourcesAsync(array{
 *     workspaceId?: string,
 *     syncSource?: string,
 *     filters?: list<array{
 *         state?: 'DELETED'|'ERROR'|'INITIALIZING'|'IN_SYNC'|'PROCESSING',
 *         resourceType?: 'COMPONENT_TYPE'|'ENTITY',
 *         resourceId?: string,
 *         externalId?: string,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaces(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateComponentType(array $args = [])
 * @phpstan-method \Aws\Result updateComponentType(array{
 *     workspaceId?: string,
 *     isSingleton?: bool,
 *     componentTypeId?: string,
 *     description?: string,
 *     propertyDefinitions?: array<string, array{
 *         dataType?: array,
 *         isRequiredInEntity?: bool,
 *         isExternalId?: bool,
 *         isStoredExternally?: bool,
 *         isTimeSeries?: bool,
 *         defaultValue?: array,
 *         configuration?: array<string, string>,
 *         displayName?: string,
 *         ...,
 *     }>,
 *     extendsFrom?: list<string>,
 *     functions?: array<string, array{requiredProperties?: list<string>, scope?: 'ENTITY'|'WORKSPACE', implementedBy?: array, ...}>,
 *     propertyGroups?: array<string, array{groupType?: 'TABULAR', propertyNames?: list<string>, ...}>,
 *     componentTypeName?: string,
 *     compositeComponentTypes?: array<string, array{componentTypeId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComponentTypeAsync(array{
 *     workspaceId?: string,
 *     isSingleton?: bool,
 *     componentTypeId?: string,
 *     description?: string,
 *     propertyDefinitions?: array<string, array{
 *         dataType?: array,
 *         isRequiredInEntity?: bool,
 *         isExternalId?: bool,
 *         isStoredExternally?: bool,
 *         isTimeSeries?: bool,
 *         defaultValue?: array,
 *         configuration?: array<string, string>,
 *         displayName?: string,
 *         ...,
 *     }>,
 *     extendsFrom?: list<string>,
 *     functions?: array<string, array{requiredProperties?: list<string>, scope?: 'ENTITY'|'WORKSPACE', implementedBy?: array, ...}>,
 *     propertyGroups?: array<string, array{groupType?: 'TABULAR', propertyNames?: list<string>, ...}>,
 *     componentTypeName?: string,
 *     compositeComponentTypes?: array<string, array{componentTypeId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEntity(array $args = [])
 * @phpstan-method \Aws\Result updateEntity(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     entityName?: string,
 *     description?: string,
 *     componentUpdates?: array<string, array{
 *         updateType?: 'CREATE'|'DELETE'|'UPDATE',
 *         description?: string,
 *         componentTypeId?: string,
 *         propertyUpdates?: array<string, array>,
 *         propertyGroupUpdates?: array<string, array>,
 *         ...,
 *     }>,
 *     compositeComponentUpdates?: array<string, array{
 *         updateType?: 'CREATE'|'DELETE'|'UPDATE',
 *         description?: string,
 *         propertyUpdates?: array<string, array>,
 *         propertyGroupUpdates?: array<string, array>,
 *         ...,
 *     }>,
 *     parentEntityUpdate?: array{updateType?: 'DELETE'|'UPDATE', parentEntityId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEntityAsync(array{
 *     workspaceId?: string,
 *     entityId?: string,
 *     entityName?: string,
 *     description?: string,
 *     componentUpdates?: array<string, array{
 *         updateType?: 'CREATE'|'DELETE'|'UPDATE',
 *         description?: string,
 *         componentTypeId?: string,
 *         propertyUpdates?: array<string, array>,
 *         propertyGroupUpdates?: array<string, array>,
 *         ...,
 *     }>,
 *     compositeComponentUpdates?: array<string, array{
 *         updateType?: 'CREATE'|'DELETE'|'UPDATE',
 *         description?: string,
 *         propertyUpdates?: array<string, array>,
 *         propertyGroupUpdates?: array<string, array>,
 *         ...,
 *     }>,
 *     parentEntityUpdate?: array{updateType?: 'DELETE'|'UPDATE', parentEntityId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePricingPlan(array $args = [])
 * @phpstan-method \Aws\Result updatePricingPlan(array{pricingMode?: 'BASIC'|'STANDARD'|'TIERED_BUNDLE', bundleNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePricingPlanAsync(array{pricingMode?: 'BASIC'|'STANDARD'|'TIERED_BUNDLE', bundleNames?: list<string>, ...} $args = [])
 * @method \Aws\Result updateScene(array $args = [])
 * @phpstan-method \Aws\Result updateScene(array{
 *     workspaceId?: string,
 *     sceneId?: string,
 *     contentLocation?: string,
 *     description?: string,
 *     capabilities?: list<string>,
 *     sceneMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSceneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSceneAsync(array{
 *     workspaceId?: string,
 *     sceneId?: string,
 *     contentLocation?: string,
 *     description?: string,
 *     capabilities?: list<string>,
 *     sceneMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspace(array{workspaceId?: string, description?: string, role?: string, s3Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array{workspaceId?: string, description?: string, role?: string, s3Location?: string, ...} $args = [])
 */
class IoTTwinMakerClient extends AwsClient {}
